<?php

class Aweber_Newsletter_Subscribtion_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	function __construct() {
		parent::__construct(
			'Aweber_Newsletter_Subscribtion_Widget', // Base ID
			__( 'Aweber Newsletter Subscribtion Widget', 'rfsl_domain' ), // Name
			array( 'description' => __( 'A widget that gererates form for your aweber newsletter subscription ', 'rfsl_domain' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
        
        
        
        if(isset($instance['widgettitle']))
        {
           $widgettitle=esc_attr($instance['widgettitle']); 
        }
        else
        {
            $widgettitle='Subscribe For Newsletter';
        }
        
            if(isset($instance['uniquelist']))
        {
           $uniquelist=esc_attr($instance['uniquelist']);
        }
        else
        {
           $uniquelist='';
        }
        if(isset($instance[thankyoupage]))
        {
            $thankyoupage=esc_attr($instance[thankyoupage]);
        }
        else
        {
            $thankyoupage='';
        }
        $widgetbgcolor=esc_attr($instance['widgetbgcolor']);
        $widgetfontcolor=esc_attr($instance['widgetfontcolor']);
        $widgetbtncolor=esc_attr($instance['widgetbtncolor']);
        
        ?>
        <style>
            .rf_widget_container input[type="submit"]
            {
                background-color:<?php echo $widgetbtncolor ?>;
            }
            .rf_widget_container input[type="submit"]:hover
            {
                background-color:#999;
            }
       </style>    

        <div class="rf_widget_container" style="background-color:<?php echo $widgetbgcolor ?>;color:<?php echo $widgetfontcolor ?> ">
                <span><?php echo $widgettitle ?></span><br/>
                <div class="rf_widget_form_container">
                <form method="post" action="https://www.aweber.com/scripts/addlead.pl">
                    <input type="hidden" name="listname" value="<?php echo $uniquelist ?>" />
                    <input type="hidden" name="redirect" value="<?php echo $thankyoupage ?>" />
                    <input type="hidden" name="meta_adtracking" value="custom form" />
                    <input type="hidden" name="meta_message" value="1" /> 
                    <input type="hidden" name="meta_required" value="name,email" /> 
                    <input type="hidden" name="meta_forward_vars" value="1" /> 
                    <span>User Name</span><br/>
                    <input type="text" placeholder="john"><br/>
                    <span>Email</span><br/>
                    <input type="text" placeholder="abc@abc.com"><br/>
                    <input  type="submit" class="rf_sbrb_btn" name="submit" value="Subscribe" /> 
                </form>
                </div>
                
            </div>   


     <?php
        
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
        $this->getForm($instance);
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
        
        $instance=array(
        
        'widgettitle'=>(!empty($new_instance['widgettitle'])) ? strip_tags($new_instance['widgettitle']) : '',
        'uniquelist'=>(!empty($new_instance['uniquelist']))  ?  strip_tags($new_instance['uniquelist']) : '',
        'widgetbgcolor'=>(!empty($new_instance['widgetbgcolor'])) ? strip_tags($new_instance['widgetbgcolor']) : '' ,
        'widgetfontcolor'=>(!empty($new_instance['widgetfontcolor'])) ? strip_tags($new_instance['widgetfontcolor']) : '' ,
        'widgetbtncolor'=>(!empty($new_instance['widgetbtncolor'])) ? strip_tags($new_instance['widgetbtncolor']) : '',
        'thankyoupage'=>(!empty($new_instance['thankyoupage'])) ? strip_tags($new_instance['thankyoupage']) : ''    
        
        
        
        );
        
        
        return $instance;
        
	}
    
    public function getForm($instance)
    {
        if(isset($instance[widgettitle]))
        {
            $widgettitle=esc_attr($instance[widgettitle]);
        }
        else
        {
            $widgettitle='';
        }
        if(isset($instance[uniquelist]))
        {
            $uniquelist=esc_attr($instance[uniquelist]);
        }
        else
        {
            $uniquelist='';
        }
        
        if(isset($instance[widgetbgcolor]))
        {
            $widgetbgcolor=esc_attr($instance[widgetbgcolor]);
        }
        else
        {
            $widgetbgcolor='';
        }
        
        if(isset($instance[widgetfontcolor]))
        {
            $widgetfontcolor=esc_attr($instance[widgetfontcolor]);
        }
        else
        {
            $widgetfontcolor='';
        }
        
        if(isset($instance[widgetbtncolor]))
        {
            $widgetbtncolor=esc_attr($instance[widgetbtncolor]);
        }
        else
        {
            $widgetbtncolor='';
        }
        if(isset($instance[thankyoupage]))
        {
            $thankyoupage=esc_attr($instance[thankyoupage]);
        }
        else
        {
            $thankyoupage='';
        }
        ?>

        <p>
            
            <label for="<?php echo esc_attr($this->get_field_id( 'widgettitle' )); ?>">
            
            <?php _e(esc_attr('Widget Title')); ?>    
                
            </label>
            
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'widgettitle' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'widgettitle' )); ?>"  type="text"  value="<?php  echo $widgettitle; ?>" >

            
        </p>
       <p>
             <label for="<?php echo esc_attr($this->get_field_id( 'uniquelist' )); ?>">
            
            <?php _e(esc_attr('Your Unique Aweber List Id')); ?>    
                
            </label>
            
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'uniquelist' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'uniquelist' )); ?>"  type="text"  value="<?php  echo  $uniquelist; ?>" >
             
           
       </p>

        <p>
             <label for="<?php echo esc_attr($this->get_field_id( 'thankyoupage' )); ?>">
            
            <?php _e(esc_attr('Thank you page url')); ?>    
                
            </label>
            
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'thankyoupage' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'thankyoupage' )); ?>"  type="text"  value="<?php  echo  $thankyoupage; ?>" >
             
           
       </p>

        <p>
             <label for="<?php echo esc_attr($this->get_field_id( 'widgetbgcolor' )); ?>">
            
            <?php _e(esc_attr('Widget background color')); ?>    
                
            </label>
            
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'widgetbgcolor' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'widgetbgcolor' )); ?>"  type="text"  value="<?php  echo  $widgetbgcolor; ?>" >
             
           
       </p>

      <p>
             <label for="<?php echo esc_attr($this->get_field_id( 'widgetfontcolor' )); ?>">
            
            <?php _e(esc_attr('Widget Font color')); ?>    
                
            </label>
            
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'widgetfontcolor' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'widgetfontcolor' )); ?>"  type="text"  value="<?php  echo  $widgetfontcolor; ?>" >
             
           
       </p>

       <p>
             <label for="<?php echo esc_attr($this->get_field_id( 'widgetbtncolor' )); ?>">
            
            <?php _e(esc_attr('Widget Button color')); ?>    
                
            </label>
            
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'widgetbtncolor' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'widgetbtncolor' )); ?>"  type="text"  value="<?php  echo  $widgetbtncolor; ?>" >
             
           
       </p>

         <?php 

        
        
        
    }
}