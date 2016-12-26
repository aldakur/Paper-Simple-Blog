<?php

class mpw_widget extends WP_Widget {
 
    function mpw_widget(){
        // Constructor del Widget.
        $widget_ops = array(
            'classname' => 'mpw_widget', 
            'description' => "Descripción de Mi primer Widget" ,
            );
        //$this->WP_Widget('mpw_widget', "Mi primer Widget", $widget_ops);
        parent::__construct('archives', __('Archives'), $widget_ops);
    }
 
    function widget($args,$instance){
        // Contenido del Widget que se mostrará en la Sidebar
        echo $before_widget;    
        $c = ! empty( $instance['count'] ) ? '1' : '0';
        $d = ! empty( $instance['dropdown'] ) ? '1' : '0';

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Archives' ) : $instance['title'], $instance, $this->id_base );

        echo $args['before_widget'];
        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        if ( $d ) {
            // echo 'inside D';
            $dropdown_id = "{$this->id_base}-dropdown-{$this->number}";
            ?>
            <div class="btn-group"> 
                <a class="btn btn-default dropdown-toggle btn-select" data-toggle="dropdown" href="#">Hilabetea aukeratu <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>

            <?php
         /**
         * Filters the arguments for the Archives widget.
         *
         * @since 2.8.0
         *
         * @see wp_get_archives()
         *
         * @param array $args An array of Archives option arguments.
         */
        wp_get_archives( apply_filters( 'widget_archives_args', array(
            'type'            => 'monthly',
            'show_post_count' => $c
        ) ) );
        ?>
                    </li>
                </ul>
            </div>
        </div>
        <?php 
             } else {  
        ?>
        <ul class="list-group">
        <?php
        /**
         * Filters the arguments for the Archives widget.
         *
         * @since 2.8.0
         *
         * @see wp_get_archives()
         *
         * @param array $args An array of Archives option arguments.
         */
        wp_get_archives( apply_filters( 'widget_archives_args', array(
            'type'            => 'monthly',
            'show_post_count' => $c
        ) ) );

        ?>
            </ul>
        </div>
                
        <?php
        }
        ?>

        <?php
        echo $after_widget;
    }
 
    function update($new_instance, $old_instance){
        // Función de guardado de opciones 
        // $instance = $old_instance;
        // $instance["mpw_texto"] = strip_tags($new_instance["mpw_texto"]);
        $instance = $old_instance;
        $new_instance = wp_parse_args( (array) $new_instance, array( 'title' => '', 'count' => 0, 'dropdown' => '') );
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['count'] = $new_instance['count'] ? 1 : 0;
        $instance['dropdown'] = $new_instance['dropdown'] ? 1 : 0;

        return $instance;

    }
 
    function form($instance){
        // Formulario de opciones del Widget, que aparece cuando añadimos el Widget a una Sidebar
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $title = sanitize_text_field( $instance['title'] );
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
        <p>

        <input class="checkbox" type="checkbox"<?php checked( $instance['dropdown'] ); ?> id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>" /> <label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e('Display as dropdown'); ?></label>
        <br/>

        <input class="checkbox" type="checkbox"<?php checked( $instance['count'] ); ?> id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" /> <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Show post counts'); ?></label>
        </p>
        <?php 
    }    
} 
 
?>