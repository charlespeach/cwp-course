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
          <img class="left" src="$ProfilePic.SetWidth(300).Url">
          $Content.RichLinks
        </div>
      </div>

      <h2>Endorsements</h2>
      <dl>
      <% loop Endorsements.Sort("Created DESC") %>
        <dt>$Comments</dt>
        <dd>- $EndorsedBy</dd>
      <% end_loop %>
      </dl>

      <h2>Endorse this person</h2>
      $EndorsementForm

      <% include RelatedPages %>
      $PageComments
      <% include PrintShare %>
    </div>
    <% include LastEdited %>
  </div>
</div>
