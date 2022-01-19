<?php
/**
 * Custom Meta Boxes using Option Tree framework
 * @package Livemesh_Framework
 */

/**
 * Initialize the meta boxes.
 */

add_action('admin_init', 'lta_custom_meta_boxes');

if (!function_exists('lta_custom_meta_boxes')) {

    function lta_custom_meta_boxes() {

        // Cannot add metaboxes if OptionTree framework is not activated
        if (!function_exists('ot_register_meta_box'))
            return;

        lta_build_pricing_plan_meta_boxes();

        if (current_theme_supports('single-page-site') || current_theme_supports('composite-page'))
            lta_build_page_section_meta_boxes();

        if (current_theme_supports('education-press')) {

            lta_build_course_meta_boxes();

            /* lta_build_event_page_meta_boxes(); */

            lta_build_department_meta_boxes();

            lta_build_staff_profile_meta_boxes();

            lta_build_student_testimonials_meta_boxes();

        }
        elseif (current_theme_supports('fitness-press')) {

            lta_build_fitness_class_meta_boxes();

            lta_build_trainer_profile_meta_boxes();

            lta_build_testimonials_meta_boxes();

        }
        else {
            lta_build_testimonials_meta_boxes();

            lta_build_team_profile_meta_boxes();
        }
    }
}


if (!function_exists('lta_build_testimonials_meta_boxes')) {
    function lta_build_testimonials_meta_boxes() {
        $testimonials_meta_box = array(
            'id' => 'mo_testimonial_details',
            'title' => __('Testimonial Details', 'livemesh-theme-addons'),
            'desc' => '',
            'pages' => array('testimonials'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_client_name',
                    'label' => __('Client', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Enter the name of the client for the testimonial.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_client_details',
                    'label' => __('Client Details', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Enter additional details like position, business name, URL etc. for the source of the testimonial.', 'livemesh-theme-addons'),
                )
            )
        );

        ot_register_meta_box($testimonials_meta_box);
    }
}

if (!function_exists('lta_build_student_testimonials_meta_boxes')) {
    function lta_build_student_testimonials_meta_boxes() {
        $testimonials_meta_box = array(
            'id' => 'mo_testimonial_details',
            'title' => __('Testimonial Details', 'livemesh-theme-addons'),
            'desc' => '',
            'pages' => array('testimonials'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_student_name',
                    'label' => __('Student Name', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Enter the name of the student for the testimonial.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_student_details',
                    'label' => __('Student Details', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Enter the details, if any, of the student for the testimonial.', 'livemesh-theme-addons'),
                )
            )
        );

        ot_register_meta_box($testimonials_meta_box);
    }
}

if (!function_exists('lta_build_pricing_plan_meta_boxes')) {
    function lta_build_pricing_plan_meta_boxes() {
        $pricing_meta_box = array(
            'id' => 'mo_pricing_details',
            'title' => __('Pricing Plan Details', 'livemesh-theme-addons'),
            'desc' => '',
            'pages' => array('pricing'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_price_tag',
                    'label' => __('Price Tag', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Enter the price tag for the pricing plan. <strong>HTML is accepted</strong>', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_pricing_tagline',
                    'label' => __('Tagline Text', 'livemesh-theme-addons'),
                    'desc' => __('Provide any taglines like "Most Popular", "Best Value", "Best Selling", "Most Flexible" etc. that you would like to use for this pricing plan.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_pricing_img',
                    'label' => __('Pricing Image', 'livemesh-theme-addons'),
                    'desc' => __('Choose the custom image that represents this pricing plan, if any.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'upload',
                ),
                array(
                    'id' => 'mo_pricing_url',
                    'label' => __('URL for the Pricing link/button', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Provide the target URL for the link or the button shown for this pricing plan.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_pricing_button_text',
                    'label' => __('Text for the Pricing link/button', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Provide the text for the link or the button shown for this pricing plan.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_highlight_pricing',
                    'label' => __('Highlight Pricing Plan', 'livemesh-theme-addons'),
                    'desc' => __('Specify if you want to highlight the pricing plan.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'checkbox',
                    'class' => '',
                    'choices' => array(
                        array(
                            'value' => 'Yes',
                            'label' => __('Yes', 'livemesh-theme-addons'),
                            'src' => ''
                        )
                    )
                )
            )
        );

        ot_register_meta_box($pricing_meta_box);
    }
}

if (!function_exists('lta_build_team_profile_meta_boxes')) {
    function lta_build_team_profile_meta_boxes() {
        $team_meta_box = array(
            'id' => 'mo_team_profile_options',
            'title' => __('Team Profile Details', 'livemesh-theme-addons'),
            'desc' => '',
            'pages' => array('team'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_position',
                    'label' => __('Position', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Enter the position of the team member.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_email',
                    'label' => __('Email', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Provide email for the team member.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_twitter',
                    'label' => __('Twitter', 'livemesh-theme-addons'),
                    'desc' => __('URL of the Twitter page of the team member.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_linkedin',
                    'label' => __('LinkedIn', 'livemesh-theme-addons'),
                    'desc' => __('URL of the LinkedIn profile of the team member.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_facebook',
                    'label' => __('Facebook', 'livemesh-theme-addons'),
                    'desc' => __('URL of the Facebook page of the team member.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_dribbble',
                    'label' => __('Dribbble', 'livemesh-theme-addons'),
                    'desc' => __('URL of the Dribbble profile of the team member.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_googleplus',
                    'label' => __('Google Plus', 'livemesh-theme-addons'),
                    'desc' => __('URL of the Google Plus page of the team member.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_instagram',
                    'label' => __('Instagram', 'livemesh-theme-addons'),
                    'desc' => __('URL of the Instagram feed for the team member.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                )
            )
        );

        ot_register_meta_box($team_meta_box);
    }
}


if (!function_exists('lta_build_page_section_meta_boxes')) {
    function lta_build_page_section_meta_boxes() {
        $page_section_meta_box = array(
            'id' => 'mo_page_section_details',
            'title' => __('Page Section Details', 'livemesh-theme-addons'),
            'desc' => '',
            'pages' => array('page_section'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_page_section_desc',
                    'label' => __('Page Section Description', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'textarea',
                    'rows' => '3',
                    'desc' => __('Enter a short description for this page section. This description for the page sections is shown in the page edit window for single page site template pages.<p>When composing a single page, this optional description comes handy in identifying a page section when there are many similar page sections or when title is too short to provide any clue about the function or purpose of the page section.<p>', 'livemesh-theme-addons'),
                )
            )
        );

        ot_register_meta_box($page_section_meta_box);
    }
}

if (!function_exists('lta_build_event_page_meta_boxes')) {

    function lta_build_event_page_meta_boxes() {

        /* Ensure that the Events Manager plugin is activated */
        if (!class_exists('Tribe__Events__Main')) {
            return;
        }

        if (current_theme_supports('education-press')) {

            $organizer_meta_box = array(
                'id' => 'mo_event_organizer',
                'title' => __('Organizer Information', 'livemesh-theme-addons'),
                'desc' => '',
                'pages' => array(Tribe__Events__Main::POSTTYPE),
                'context' => 'side',
                'priority' => 'default',
                'fields' => array(
                    array(
                        'label' => __('Choose the staff for this event', 'livemesh-theme-addons'),
                        'id' => 'mo_staff_for_event',
                        'type' => 'custom-post-type-checkbox',
                        'desc' => __('Choose one or more staff members who will be conducting this event.', 'livemesh-theme-addons'),
                        'std' => '',
                        'rows' => '',
                        'post_type' => 'staff',
                        'taxonomy' => '',
                        'class' => ''
                    )
                )
            );

            ot_register_meta_box($organizer_meta_box);

            $classes_meta_box = array(
                'id' => 'mo_related_event',
                'title' => __('Classes for Event', 'livemesh-theme-addons'),
                'desc' => '',
                'pages' => array(Tribe__Events__Main::POSTTYPE),
                'context' => 'side',
                'priority' => 'default',
                'fields' => array(
                    array(
                        'label' => __('Choose the class(es) associated with this event', 'livemesh-theme-addons'),
                        'id' => 'mo_classes_for_event',
                        'type' => 'custom-post-type-checkbox',
                        'desc' => __('Choose one or more classes that will be conducted as part of this event.', 'livemesh-theme-addons'),
                        'std' => '',
                        'rows' => '',
                        'post_type' => 'course',
                        'taxonomy' => '',
                        'class' => ''
                    )
                )
            );

            ot_register_meta_box($classes_meta_box);

        }

    }
}

if (!function_exists('lta_build_department_meta_boxes')) {

    function lta_build_department_meta_boxes() {

        $department_meta_box = array(
            'id' => 'mo_department',
            'title' => __('Department Information', 'livemesh-theme-addons'),
            'desc' => '',
            'pages' => array('department'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'label' => __('Choose the courses for this department', 'livemesh-theme-addons'),
                    'id' => 'mo_courses',
                    'type' => 'custom-post-type-checkbox',
                    'desc' => __('Choose one or more courses conducted by this department.', 'livemesh-theme-addons'),
                    'std' => '',
                    'rows' => '',
                    'post_type' => 'course',
                    'taxonomy' => '',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_contact_name',
                    'label' => __('Department Contact', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Enter the name of the contact person for the department.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_contact_title',
                    'label' => __('Department Contact Title', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Specify the title of the contact person for the department.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_phone',
                    'label' => __('Phone Number', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Enter the phone number for the department.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_email',
                    'label' => __('Contact Email', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Enter the email for contacting the department.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_website',
                    'label' => __('Website', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Enter the website URL for the department.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_address',
                    'label' => __('Contact Address', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'textarea',
                    'desc' => __('Enter the department address.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_twitter',
                    'label' => 'Twitter',
                    'desc' => __('URL of the Twitter page of the department.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_linkedin',
                    'label' => 'LinkedIn',
                    'desc' => __('URL of the LinkedIn profile of the department.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_facebook',
                    'label' => 'Facebook',
                    'desc' => __('URL of the Facebook page of the department.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_googleplus',
                    'label' => 'Google Plus',
                    'desc' => __('URL of the Google Plus page of the department.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_instagram',
                    'label' => 'Instagram',
                    'desc' => __('URL of the Instagram feed for the department.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                )

            )
        );

        ot_register_meta_box($department_meta_box);

    }
}

if (!function_exists('lta_build_course_meta_boxes')) {

    function lta_build_course_meta_boxes() {

        $course_meta_box = array(
            'id' => 'mo_course_information',
            'title' => __('Course Information', 'livemesh-theme-addons'),
            'desc' => '',
            'pages' => array('course'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'label' => __('Choose the staff handling this course', 'livemesh-theme-addons'),
                    'id' => 'mo_staff_for_course',
                    'type' => 'custom-post-type-checkbox',
                    'desc' => __('Choose one or more staff members who will be conducting this course.', 'livemesh-theme-addons'),
                    'std' => '',
                    'rows' => '',
                    'post_type' => 'staff',
                    'taxonomy' => '',
                    'class' => ''
                ),
                array(
                    'label' => __('Choose the department(s) handling this course', 'livemesh-theme-addons'),
                    'id' => 'mo_department',
                    'type' => 'custom-post-type-checkbox',
                    'desc' => __('Choose one or more departments which handle this course.', 'livemesh-theme-addons'),
                    'std' => '',
                    'rows' => '',
                    'post_type' => 'department',
                    'taxonomy' => '',
                    'class' => ''
                ),
                array(
                    'label' => __('Related Courses', 'livemesh-theme-addons'),
                    'id' => 'mo_related_courses',
                    'type' => 'custom-post-type-checkbox',
                    'desc' => __('Choose the related courses if you need to handpick them for display. If nothing is chosen, by default, all courses which belong to the same course category are displayed as related courses.', 'livemesh-theme-addons'),
                    'std' => '',
                    'rows' => '',
                    'post_type' => 'course',
                    'taxonomy' => '',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_course_identifier',
                    'label' => __('Course Id', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Enter the course identifier.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_discipline',
                    'label' => __('Course Discipline', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Enter the course discipline.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_credit',
                    'label' => __('Credit', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Specify the course credit.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_room',
                    'label' => __('Room Number', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Enter the information for the room where the course will be conducted.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_days',
                    'label' => __('Days the course is conducted', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Specify the week days when the course will be conducted.', 'livemesh-theme-addons'),
                ),
                array(
                    'id' => 'mo_timings',
                    'label' => __('Course Timings', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Specify the timings during the day when the course will be conducted.', 'livemesh-theme-addons'),
                ),

            )
        );

        ot_register_meta_box($course_meta_box);

    }
}


if (!function_exists('lta_build_staff_profile_meta_boxes')) {
    function lta_build_staff_profile_meta_boxes() {
        $staff_meta_box = array(
            'id' => 'mo_staff_profile_options',
            'title' => __('Staff Profile Details', 'livemesh-theme-addons'),
            'desc' => '',
            'pages' => array('staff'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_staff_title',
                    'label' => __('Staff Title', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Provide the title for the staff/faculty.', 'livemesh-theme-addons')
                ),
                array(
                    'id' => 'mo_phone',
                    'label' => __('Phone', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Provide phone for the staff/faculty.', 'livemesh-theme-addons')
                ),
                array(
                    'id' => 'mo_email',
                    'label' => __('Email', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Provide email for the staff/faculty.', 'livemesh-theme-addons')
                ),
                array(
                    'id' => 'mo_website',
                    'label' => __('Website URL', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => __('Provide website URL for the staff/faculty.', 'livemesh-theme-addons')
                ),
                array(
                    'id' => 'mo_campus_address',
                    'label' => __('Campus Address', 'livemesh-theme-addons'),
                    'desc' => '',
                    'std' => '',
                    'type' => 'textarea',
                    'desc' => __('Provide campus for the staff/faculty.', 'livemesh-theme-addons')
                ),
                array(
                    'label' => __('Choose the Department', 'livemesh-theme-addons'),
                    'id' => 'mo_department_for_staff',
                    'type' => 'custom-post-type-checkbox',
                    'desc' => __('Choose the department to which this staff/faculty belongs to.', 'livemesh-theme-addons'),
                    'std' => '',
                    'rows' => '',
                    'post_type' => 'department',
                    'taxonomy' => '',
                    'class' => ''
                ),
                array(
                    'label' => __('Courses Taught', 'livemesh-theme-addons'),
                    'id' => 'mo_courses_taught',
                    'type' => 'custom-post-type-checkbox',
                    'desc' => __('Choose the courses taught by this staff/faculty.', 'livemesh-theme-addons'),
                    'std' => '',
                    'rows' => '',
                    'post_type' => 'course',
                    'taxonomy' => '',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_twitter',
                    'label' => 'Twitter',
                    'desc' => __('URL of the Twitter page of the staff/faculty.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_linkedin',
                    'label' => 'LinkedIn',
                    'desc' => __('URL of the LinkedIn profile of the staff/faculty.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_facebook',
                    'label' => 'Facebook',
                    'desc' => __('URL of the Facebook page of the staff/faculty.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_googleplus',
                    'label' => 'Google Plus',
                    'desc' => __('URL of the Google Plus page of the staff/faculty.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_instagram',
                    'label' => 'Instagram',
                    'desc' => __('URL of the Instagram feed for the staff/faculty.', 'livemesh-theme-addons'),
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                )
            )
        );

        ot_register_meta_box($staff_meta_box);
    }

    if (!function_exists('lta_build_fitness_class_meta_boxes')) {

        function lta_build_fitness_class_meta_boxes() {

            $organizer_meta_box = array(
                'id' => 'mo_class_organizer',
                'title' => 'Trainer Information',
                'desc' => '',
                'pages' => array('fitness_class'),
                'context' => 'normal',
                'priority' => 'default',
                'fields' => array(
                    array(
                        'label' => 'Choose the trainer(s) for this class',
                        'id' => 'mo_trainers_for_class',
                        'type' => 'custom-post-type-checkbox',
                        'desc' => 'Choose one or more trainers who will be conducting this class.',
                        'std' => '',
                        'rows' => '',
                        'post_type' => 'trainer',
                        'taxonomy' => '',
                        'class' => ''
                    ),
                    array(
                        'id' => 'mo_characteristics',
                        'label' => 'Class Characteristics',
                        'desc' => '',
                        'std' => '',
                        'type' => 'textarea',
                        'desc' => 'Enter the numbers about attributes of this class like difficulty level, fun characteristics, effectiveness etc.',
                    ),
                    array(
                        'id' => 'mo_class_stats',
                        'label' => 'Class Stats',
                        'desc' => '',
                        'std' => '',
                        'type' => 'textarea',
                        'desc' => 'Enter the statistics about the class - numbers like total classes conducted so far, trainees trained, feedback acquired etc.',
                    )
                )
            );

            ot_register_meta_box($organizer_meta_box);

        }
    }


    if (!function_exists('lta_trainer_profile_meta_boxes')) {
        function lta_build_trainer_profile_meta_boxes() {
            $trainer_meta_box = array(
                'id' => 'mo_trainer_profile_options',
                'title' => 'Trainer Profile Details',
                'desc' => '',
                'pages' => array('trainer'),
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(
                    array(
                        'id' => 'mo_certifications',
                        'label' => 'Certifications',
                        'desc' => '',
                        'std' => '',
                        'type' => 'text',
                        'desc' => 'Enter the education or certification details for the trainer.',
                    ),
                    array(
                        'id' => 'mo_specializations',
                        'label' => 'Specializations/Interests',
                        'desc' => '',
                        'std' => '',
                        'type' => 'textarea',
                        'desc' => 'Enter the details about specializations or areas of interest for the trainer.',
                    ),
                    array(
                        'id' => 'mo_experience',
                        'label' => 'Experience',
                        'desc' => '',
                        'std' => '',
                        'type' => 'textarea',
                        'desc' => 'Enter the details about experience of the trainer like number of trainings, trainees or such other statistics.',
                    ),
                    array(
                        'id' => 'mo_email',
                        'label' => 'Email',
                        'desc' => '',
                        'std' => '',
                        'type' => 'text',
                        'desc' => 'Provide email for the trainer.'
                    ),
                    array(
                        'id' => 'mo_twitter',
                        'label' => 'Twitter',
                        'desc' => 'URL of the Twitter page of the trainer.',
                        'std' => '',
                        'type' => 'text',
                        'class' => ''
                    ),
                    array(
                        'id' => 'mo_linkedin',
                        'label' => 'LinkedIn',
                        'desc' => 'URL of the LinkedIn profile of the trainer.',
                        'std' => '',
                        'type' => 'text',
                        'class' => ''
                    ),
                    array(
                        'id' => 'mo_facebook',
                        'label' => 'Facebook',
                        'desc' => 'URL of the Facebook page of the trainer.',
                        'std' => '',
                        'type' => 'text',
                        'class' => ''
                    ),
                    array(
                        'id' => 'mo_googleplus',
                        'label' => 'Google Plus',
                        'desc' => 'URL of the Google Plus page of the trainer.',
                        'std' => '',
                        'type' => 'text',
                        'class' => ''
                    ),
                    array(
                        'id' => 'mo_instagram',
                        'label' => 'Instagram',
                        'desc' => 'URL of the Instagram feed for the trainer.',
                        'std' => '',
                        'type' => 'text',
                        'class' => ''
                    )
                )
            );

            ot_register_meta_box($trainer_meta_box);
        }
    }

}
