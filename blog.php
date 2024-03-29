<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>AngularJS Blog App</title>
  <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/110131/responsive.css'>

      <link rel="stylesheet" href="css/blog.css">


</head>
<?php  //розміщено тут для того щоб можна було динамічно змінювати позицію
             // вся процедура2винен бути в тій же папці, що і всі інші, якщо це не так, то просто змініть шлях
              include    ("header.php");
              ?>

<body>
  <body ng-app="blogApp">

  <div ng-controller="BlogController as blog">
      <div class="topbar">
        <div class="container">
          <div class="row">
            <div class="col-s-4">
              <h1 ng-click="blog.selectTab('blog')" class="push-left">{{blog.title}}</h1>
            </div>
            <div class="offset-s-4 col-s-4">
              <nav role='navigation' class="push-right">
                <ul>
                  <li><a style="cursor:pointer" ng-click="blog.selectTab('blog')">See All Posts</a></li> //
                  <li><a style="cursor:pointer" ng-click="blog.selectTab('new')">Add New Post</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>



      </div>


      <div class="content">
        <div class="container">
          <div class="row">
            <ul class="post-grid" ng-show="blog.isSelected('blog')">
          <li ng-repeat="post in blog.posts" class="col-s-4" ng-class="{ 'reset-s' : $index%3==0 }" ng-click="blog.selectTab($index)" >
            <h3>{{post.title}}</h3>
            <p>{{post.body[0] | limitTo:70}}...</p>
            <p class="fa fa-comment push-left"> {{post.comments.length}}
            </p>
            <p class="fa fa-heart push-right"> {{post.likes}}
            </p>
          </li>
        </ul>
        <div class="post" ng-repeat="post in blog.posts" ng-show="blog.isSelected($index)">
          <div>

            <h2>{{post.title}}</h2>
            <img src="{{post.image}}" ng-show="{{post.image}}"/>
            <cite>by {{post.author}} on {{post.createdOn | date}}</cite>
            <div class="post-body">
             <p ng-repeat="paragraph in post.body">
               {{paragraph}}
             </p>
            </div>

            <div class="comments" ng-controller="CommentController as commentCtrl">
              <button class="fa fa-heart" ng-click="post.likes = post.likes+1"> {{post.likes}}</button>
              <h3>Comments</h3>
              <ul>
               <li ng-repeat="comment in post.comments">
                 "{{comment.body}}"
                 <cite>- <b>{{comment.author}}</b></cite>
               </li>
              </ul>
              <form name="commentForm" ng-submit="commentForm.$valid && commentCtrl.addComment(post)" novalidate>


                <h4>Add Comment</h4>
                  <textarea ng-model="commentCtrl.comment.body" cols="30" rows="10" required></textarea>
                <label for="">by:</label>
                  <input type="text" ng-model="commentCtrl.comment.author" required placeholder="Name"/>

                  <input type="submit" value="Submit" />
                </form>
            </div>
        </div>
      </div>
        <div class="post" ng-show="blog.isSelected('new')">
          <h2>Add New Post</h2>

          <form name="postForm" ng-submit="blog.addPost()" action="testBlog.php/?next_script=blog.addPost()" method="post" novalidate>
                  <h4>Title</h4>
                  <input type="text" name="title" />
                  <h4>Body</h4>
                  <textarea ng-model="blog.post.body"  ng-list="/\n/" rows="10"></textarea>
                  <label for="">Featured Image URL</label>
                  <input type="text" ng-model="blog.post.image" placeholder="http://placekitten.com/g/2000/600" />
                  <label for="">by:</label>
                  <input type="text"   name="name" required/>

                  <input type="submit" value="Submit" />
                </select></form>

            </div>

          </div>
        </div>

    </div>
  </div>


</body>
  <script src='http://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.9/angular-animate.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/110131/jquery-2.1.0.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/110131/responsive.js'></script>

    <script src="js/blog.js"></script>

</body>
</html>
