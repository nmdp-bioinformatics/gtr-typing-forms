<!-- Copyright 2015 National Marrow Donor Program (NMDP)

This file is part of GTR Typing Forms.

GTR Typing Forms is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>. -->

<div class='container'>
<div style="margin-left:30%;margin-top:20%;margin-right:30%;" >
<form role="form" method="POST" action="form">
<div class="form-group">
  <label for="gtr_form_selection">Select a submission form:</label>
  <select name="form_select"  class="form-control" id="gtr_form_selection">
    <option value="lab">Lab</option>
    <option value="vendor">Vendor</option>
    <option value="clinicaltest">Clinical Test</option>
    <option value="researchtest">Research Test</option>
	<option value="kit">Kit</option>
  </select>
</div>
<button class="btn btn-default" type="submit">Continue</button>
</form>
</div>
</div>