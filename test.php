<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php require_once('toplinks.php'); ?>
    <style>

/*.story-container {
  width: 100%;
  overflow-x: scroll;
  white-space: nowrap;
}

.story-wrapper {
  display: inline-block;
}

.story {
  display: inline-block;
  margin-right: 10px;
  vertical-align: top;
}

.story img {
  width: 100%;
  height: auto;
}
*/
.story-header {
  display: flex;
  align-items: center;
  overflow-x: scroll;
  padding: 10px;
}

.story-items {
  display: flex;
}

.story-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-right: 20px;
  cursor: pointer;
}

.story-avatar img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

.story-user {
  margin-top: 5px;
  text-align: center;
}

.story-user h3 {
  margin: 0;
  font-size: 16px;
  font-weight: 600;
}

.story-user .story-time {
  font-size: 14px;
  color: #999;
}


            .story-header::-webkit-scrollbar{
                display: none;
            }
   
    </style>
</head>
<body>
<!-- 

<div class="story-container">
  <div class="story-wrapper">
    <div class="story">
      <img src="profile/637f7d3630cc71669299510.jpeg" alt="Story 1">
    </div>
    <div class="story">
      <img src="profile/637f7d3630cc71669299510.jpeg" alt="Story 2">
    </div>
    <div class="story">
      <img src="profile/637f7d3630cc71669299510.jpeg" alt="Story 3">
    </div>
    <div class="story">
      <img src="profile/637f7d3630cc71669299510.jpeg" alt="Story 4">
    </div>
        <div class="story">
      <img src="profile/637f7d3630cc71669299510.jpeg" alt="Story 1">
    </div>
        <div class="story">
      <img src="profile/637f7d3630cc71669299510.jpeg" alt="Story 1">
    </div>
        <div class="story">
      <img src="profile/637f7d3630cc71669299510.jpeg" alt="Story 1">
    </div>
        <div class="story">
      <img src="profile/637f7d3630cc71669299510.jpeg" alt="Story 1">
    </div>

        <div class="story">
      <img src="profile/637f7d3630cc71669299510.jpeg" alt="Story 1">
    </div>    <div class="story">
      <img src="profile/637f7d3630cc71669299510.jpeg" alt="Story 1">
    </div>

  </div>
</div>
 -->


<div class="story-header">
  <div class="story-items">
    <div class="story-item">
      <div class="story-avatar">
        <img src="profile/637f7d3630cc71669299510.jpeg" alt="User Avatar">
      </div>
      <div class="story-user">
        <h3>Username 1</h3>
        <span class="story-time">2h ago</span>
      </div>
    </div>

    <div class="story-item">
      <div class="story-avatar">
        <img src="profile/637f7d3630cc71669299510.jpeg" alt="User Avatar">
      </div>
      <div class="story-user">
        <h3>Username 2</h3>
        <span class="story-time">3h ago</span>
      </div>
    </div>

        <div class="story-item">
      <div class="story-avatar">
        <img src="profile/637f7d3630cc71669299510.jpeg" alt="User Avatar">
      </div>
      <div class="story-user">
        <h3>Username 1</h3>
        <span class="story-time">2h ago</span>
      </div>
    </div>
    
    <div class="story-item">
      <div class="story-avatar">
        <img src="profile/637f7d3630cc71669299510.jpeg" alt="User Avatar">
      </div>
      <div class="story-user">
        <h3>Username 2</h3>
        <span class="story-time">3h ago</span>
      </div>
    </div>

        <div class="story-item">
      <div class="story-avatar">
        <img src="profile/637f7d3630cc71669299510.jpeg" alt="User Avatar">
      </div>
      <div class="story-user">
        <h3>Username 1</h3>
        <span class="story-time">2h ago</span>
      </div>
    </div>
    
    <div class="story-item">
      <div class="story-avatar">
        <img src="profile/637f7d3630cc71669299510.jpeg" alt="User Avatar">
      </div>
      <div class="story-user">
        <h3>Username 2</h3>
        <span class="story-time">3h ago</span>
      </div>
    </div>

        <div class="story-item">
      <div class="story-avatar">
        <img src="profile/637f7d3630cc71669299510.jpeg" alt="User Avatar">
      </div>
      <div class="story-user">
        <h3>Username 1</h3>
        <span class="story-time">2h ago</span>
      </div>
    </div>
    
    <div class="story-item">
      <div class="story-avatar">
        <img src="profile/637f7d3630cc71669299510.jpeg" alt="User Avatar">
      </div>
      <div class="story-user">
        <h3>Username 2</h3>
        <span class="story-time">3h ago</span>
      </div>
    </div>
  </div>
</div>


<script>
// // Get the story container element
// const storyContainer = document.querySelector('.story-container');

// // Add event listener to the container to detect scroll position
// storyContainer.addEventListener('scroll', () => {
//   const scrollPosition = storyContainer.scrollLeft;
//   console.log(scrollPosition);
// });





// Get the story header and story items elements
const storyHeader = document.querySelector('.story-header');
const storyItems = document.querySelector('.story-items');

// Set the width of story items based on the number of items
const storyItemCount = storyItems.children.length;
storyItems.style.width = `${storyItemCount * 90}px`;

// Handle the horizontal scroll
let isDown = false;
let startX;
let scrollLeft;

storyHeader.addEventListener('mousedown', (e) => {
  isDown = true;
  startX = e.pageX - storyHeader.offsetLeft;
  scrollLeft = storyHeader.scrollLeft;
});

storyHeader.addEventListener('mouseleave', () => {
  isDown = false;
});

storyHeader.addEventListener('mouseup', () => {
  isDown = false;
});

storyHeader.addEventListener('mousemove', (e) => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - storyHeader.offsetLeft;
  const walk = (x - startX) * 2;
  storyHeader.scrollLeft = scrollLeft - walk;
});

</script>


</body>
</html>