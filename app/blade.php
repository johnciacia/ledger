<?php

Blade::extend(function($view, $compiler)
{
    $pattern = $compiler->createMatcher('money');

    return preg_replace($pattern, '$1<?php echo money_format( "%+.2n", e( $2 ) ); ?>', $view);
});
