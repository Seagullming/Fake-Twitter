<% include SideBar %>
$Form

<div class="content-container row">
    <div id="left-column" class="col-md-8">
        <div id="newtwittspost" class="w-100 p-3">
            $TwittForm
        </div>
        <div id="TwittsList">
            <% loop $Twitts %>
            <% include TwittCard %>
            <% end_loop %>>
        </div>
    </div>
    <div id="right-column" class="card col-md-4">
        <% include Hashtag_Column %>
    </div>

</div>