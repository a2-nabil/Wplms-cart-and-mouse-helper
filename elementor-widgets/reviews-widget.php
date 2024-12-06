<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Custom_Elementor_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'custom_elementor_widget';
    }

    public function get_title()
    {
        return __('Custom Widget', 'plugin-name');
    }

    public function get_icon()
    {
        return 'eicon-posts-grid';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'field_1',
            [
                'label' => __('Field 1', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default text', 'plugin-name'),
            ]
        );

        $this->add_control(
            'field_2',
            [
                'label' => __('Field 2', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default text', 'plugin-name'),
            ]
        );

        $this->add_control(
            'field_3',
            [
                'label' => __('Field 3', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default text', 'plugin-name'),
            ]
        );

        $this->add_control(
            'field_4',
            [
                'label' => __('Field 4', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default text', 'plugin-name'),
            ]
        );

        $this->add_control(
            'field_5',
            [
                'label' => __('Field 5', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default text', 'plugin-name'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="custom-widget">
            <p><?php echo $settings['field_1']; ?></p>
            <p><?php echo $settings['field_2']; ?></p>
            <p><?php echo $settings['field_3']; ?></p>
            <p><?php echo $settings['field_4']; ?></p>
            <p><?php echo $settings['field_5']; ?></p>
            <img src="<?php echo $settings['image']['url']; ?>" alt="">
        </div>

        <?php
    }
}
