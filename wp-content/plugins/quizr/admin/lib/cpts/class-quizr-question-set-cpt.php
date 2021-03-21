<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Quizr_Question_Set_Cpt {

    const CPT_NAME = 'quizr_question_set';

    public function register_custom_post_type_quizr_question_set()
    {
        register_post_type( static::CPT_NAME,
            array(
                'labels'      => array(
                    'name'          => __('Quizr Question Sets', 'textdomain'),
                    'singular_name' => __('Quizr Question Set', 'textdomain'),
                ),
                'public'      => true,
                'has_archive' => true,
                'supports' => array('title','thumbnail'),
            )
        );
    }

    public function add_meta_boxes()
    {
        add_meta_box(
            'quizr-questions',
            __( 'Questions', 'quizr' ),
            array( $this, 'render_questions_metabox' ),
            static::CPT_NAME,
            'advanced',
            'default'
        );
    }

    public function render_questions_metabox( $post ) {
        
        $post_id = $post->ID;

        $questions = get_posts( 
            array( 
                'post_type' => 'quizr_question',
                'meta_key' => 'quizr_question_set_id',
                'meta_value' => (int) $post->ID,
            ) 
        );

        require_once plugin_dir_path( dirname( __DIR__ ) ) . 'partials/quizr-admin-cpt-question-set-question-meta-box.php';       
    }

    public function check_answers( $answer_data ){

        $quizr_answers_table = new Quizr_Answers_Table();
        
        $return_data = [];

        foreach( $answer_data as $key => $value ) {

            $return_data[$key]['question'] = $value['question'];
            $return_data[$key]['given_answer'] = 'Not supplied';
            $return_data[$key]['correct_answer'] = 'n/a';
            $return_data[$key]['was_correct'] = false;

            $answers = $quizr_answers_table->index( $key );
            $answer_key = array_search( 1, array_column( $answers, 'is_correct' ) );

            if( $answer_key )
            {
                $correct_answer = $answers[$answer_key];

                $return_data[$key]['correct_answer'] = $correct_answer->description;

                if( array_key_exists( 'answer', $value ) )
                {
                    $return_data[$key]['given_answer'] = $value['answer']['description'];
                    $return_data[$key]['was_correct'] = 
                        (int) $value['answer']['id'] === (int) $correct_answer->id;
                }
            }                

        }

        return $return_data;      

    }

}