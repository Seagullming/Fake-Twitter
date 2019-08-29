<% include SideBar %>
<div class="content-container row">

  <div id="left-column" class="col-md-8">
    <div id="newtwittspost">
      $TwittForm
    </div>
    <div id="TwittsList"></div>
    <% loop $Twitts %>
    <div>
      <div class="card">
        <div class="card-body">
          <p class="card-text">
            $TwittContent
          </p>
          <p class="card-text">
            <small class="text-muted">Last updated 3 mins ago</small>
          </p>
        </div>
        <img class="card-img-bottom" src="..." alt="Card image cap" />
      </div>
    </div>
    <% end_loop %>>
  </div>
  <div id="right-column" class="card col-md-4">
    <div class="card-header">
      Trends
    </div>
    <ul class="list-group list-group-flush"> 
      <% loop $Hashtags %>
      <li class="list-group-item">$Title</li>
      <% end_loop %>
    </ul>
  </div>
  $Form
</div>
