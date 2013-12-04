<div class="row">
  <% include Breadcrumbs %>
  <% if Menu(2) %>
    <div class="span3">
      <% include SidebarNav %>
    </div>
  <% end_if %>
  <div class="<% if Menu(2) %>span9<% else %>span12<% end_if %>">
    <div id="main" role="main">
      <div class="page-header">
        <h1>$Title</h1>
        <h2>$JobTitle</h2>

        <div class="clearfix">
          $Content.RichLinks
        </div>
      </div>
      $Form
      <% include RelatedPages %>
      $PageComments
      <% include PrintShare %>
    </div>
    <% include LastEdited %>
  </div>
</div>
