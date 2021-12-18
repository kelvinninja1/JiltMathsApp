<?php

    include_once 'src/router/Request.php';
    include_once 'src/router/Router.php';
    // Import MCQ class
    include_once 'src/includes/mcqs/MCQs.php';

    $router = new Router(new Request);

    $router->get('/', function() {
        return include 'src/pages/index.php';
    });


    $router->get('/mcq/level/1/qns/10', function($request) {
        $mcqs = new MCQs(1, 10);
        return json_encode($mcqs->getMCQs());
    });
    $router->get('/mcq/level/1/qns/20', function($request) {
        $mcqs = new MCQs(1, 20);
        return json_encode($mcqs->getMCQs());
    });

    $router->get('/mcq/level/2/qns/10', function($request) {
        $mcqs = new MCQs(2, 10);
        return json_encode($mcqs->getMCQs());
    });
    $router->get('/mcq/level/2/qns/20', function($request) {
        $mcqs = new MCQs(2, 20);
        return json_encode($mcqs->getMCQs());
    });

    $router->get('/mcq/level/3/qns/10', function($request) {
        $mcqs = new MCQs(3, 10);
        return json_encode($mcqs->getMCQs());
    });
    $router->get('/mcq/level/3/qns/20', function($request) {
        $mcqs = new MCQs(3, 20);
        return json_encode($mcqs->getMCQs());
    });

    $router->get('/mcq/level/4/qns/10', function($request) {
        $mcqs = new MCQs(4, 10);
        return json_encode($mcqs->getMCQs());
    });
    $router->get('/mcq/level/4/qns/20', function($request) {
        $mcqs = new MCQs(4, 20);
        return json_encode($mcqs->getMCQs());
    });

    $router->get('/mcq/level/5/qns/10', function($request) {
        $mcqs = new MCQs(5, 10);
        return json_encode($mcqs->getMCQs());
    });
    $router->get('/mcq/level/5/qns/20', function($request) {
        $mcqs = new MCQs(5, 20);
        return json_encode($mcqs->getMCQs());
    });

    $router->get('/mcq/level/6/qns/10', function($request) {
        $mcqs = new MCQs(6, 10);
        return json_encode($mcqs->getMCQs());
    });
    $router->get('/mcq/level/6/qns/20', function($request) {
        $mcqs = new MCQs(6, 20);
        return json_encode($mcqs->getMCQs());
    });
