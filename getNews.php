<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

// echo "test";
// $cat = get_categories();
// var_dump($cat[16]);
// $terms_list = wp_get_post_categories( 0, array( 'fields'=>'names', 'order'=> 'DESC' ) );
// var_dump($terms_list);
global $nPosts;

if(isset($_GET['nPosts'])){
    $nPosts = $_GET['nPosts'];
}
else{
    $nPosts = 6;
}

$args = array(
    'category_name' => 'flash-news',
    'posts_per_page' => $nPosts,
);
  
$arr_posts = new WP_Query( $args );
// var_dump($arr_posts);
// var_dump(apply_filters( 'the_content', $arr_posts->get_posts()[0]->post_content));
// $content  = apply_filters( 'the_content', $arr_posts->get_posts()[0]->post_content);
$res = [];
if ( $arr_posts->have_posts() ){

    $posts = $arr_posts->get_posts();
    // var_dump($posts);
    foreach ($posts as $post){
      /* echo '<pre>';
        var_dump($post);
      echo '</pre>'; */
      $content = apply_filters( 'the_content',$post->post_content);
      $i = strpos($content, "src")+5;
      $f = strpos($content, "alt")-2;
      $imgURL =  substr($content, $i, $f-$i);
      $title = $post->post_title;
      $url = $post->guid;
      array_push($res, ["title"=> $title, "image"=>$imgURL, "url"=>$url]);
    }
}

echo json_encode($res);

?>