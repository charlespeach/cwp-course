<p>Showing $FirstItem - $LastItem of $getTotalItems items</p>

<p>
<% if PrevLink %>
<a href="$PrevLink">&laquo; Prev</a>
<% else %>
<span>&laquo; Prev</span>
<% end_if %>
&nbsp;

<% loop Pages %>
  <% if CurrentBool %>
  <b>$PageNum</b>
  <% else %>
  <a href="$Link">$PageNum</a>
  <% end_if%>
<% end_loop %>
&nbsp;

<% if NextLink %>
<a href="$NextLink">Next &raquo;</a>
<% else %>
<span>Next &raquo;</span>
<% end_if %>
</p>
