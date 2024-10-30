<?php
/**
 * The widget functionality of the plugin.

 * @link Bulgarian Horoscope
 * @since 1.0.0

 * @package bulgarian-horoscope
 * @subpackage bulgarian-horoscope/includes
 */


 class Bulgarian_Horoscope_Widget extends WP_Widget {

   private $plugin_name;
      function __construct() {
         parent::__construct(

             // base ID of the widget
             'bulgarian_horoscope_widget',

             // name of the widget
             __('Хороскоп', 'bulgarian-horoscope' ),

             // widget options
             array (
                 'description' => __( 'Добавете безплатен хороскоп в вашият сайт/блог, обновява се всеки ден!', 'bulgarian-horoscope' )
             )

         );
      }

      function form( $instance ) {
         if(isset($instance['title'])) {
         $title = esc_attr( $instance['title'] );
      } else {
      $title = null;
      }
         ?>
         <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Заглавие:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
      <?php
      }

      function update( $new_instance, $old_instance ) {
         $instance = $old_instance;

         $instance['title'] = strip_tags( $new_instance['title'] );
         return $instance;
      }

      function widget( $args, $instance ) {
         extract( $args );
         $title = apply_filters( 'widget_title', $instance['title'] );
         echo $before_widget;

          if ( $title ) {
              echo $before_title . $title . $after_title;
          }

          // TRANSIENTS
           $transient = get_transient( 'zn_d_horoscope' );

           if(empty( $transient )) {
             $rm_horoscope = wp_remote_get('https://znacite.com/api/v1/horoscope/daily');
             $transient = $rm_horoscope;
             set_transient( 'zn_d_horoscope', $rm_horoscope, '14400' );
            }

      			//Convert the JSON string back into an array.
      			$horoscope = json_decode($transient['body'], true);
          ?>

         <div id="znacite-horoscopi">
           <div id="zn-nachalo" class="row" style="display: block;" align="center">
             <?php foreach($horoscope as $daily) { ?>
                <a class="hor-md-4" title="<?php echo $daily['zodiac_cyr']?>" href="javascript:showhide('zn-<?php echo $daily['zodiac_lat']?>');"> <?php echo $daily['zodiac_icon']?></a>
               <?php } ?>
           </div>

           <?php foreach($horoscope as $daily) { ?>
             <div id="zn-<?php echo $daily['zodiac_lat']?>" class="zn-hrtext" style="display: none;" align="center">
                <?php echo $daily['zodiac_cyr']?> <?php echo $daily['zodiac_icon']?>
                <hr />
                <?php echo $daily['horoscope']?>
                <hr />
             <a href="javascript:showstart_hidecurrent('zn-<?php echo $daily['zodiac_lat']?>');">Обратно</a>
             </div>
           <?php } ?>
         
         <?php
          echo $after_widget;
      }
 }
