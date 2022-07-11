<?php

    function activeMenu($route, $name){
        return $name == $route ? 'active' : '';
    }

  