<% if EnableRegistrations %>
  <div class="well">
    <% if SpacesAvailable %>
    <h2>Register</h2>
    <h3>$SpacesAvailable spaces left</h3>
    $RegistrationForm
    <% else %>
    <p>No spaces left</p>
    <% end_if %>
  </div>

  <div class="well">
    <h2>Attending</h2>
    <ul>
    <% loop Attending %>
      <li>$FirstName - $Organisation</li>
    <% end_loop %>
    </ul>
  </div>
<% end_if %>
