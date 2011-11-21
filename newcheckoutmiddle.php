<div id="middle">
	<h1>New Checkout</h1>
	<fieldset>
		<legend>Client</legend>
		
		<table class="silent">
			<tr>
				<td width="300">
					<input type="text" name="searchclient" />
				</td>
				<td width="80">
					<input type="button" value="Search"/>
				</td>
			</tr>
			<tr>
				<td width="300">
					<select multiple name="music" size="10" >
						<option value="emo" selected>Emo</option>
						<option value="metal/rock" >Metal/Rock sdfg sdfg dsfg sdfg sdfgsfd</option>
						<option value="hiphop" >Hip Hop</option>
						<option value="ska" >Ska</option>
						<option value="jazz" >Jazz</option>
						<option value="country" >Country</option>
						<option value="classical" >Classical</option>
						<option value="alternative" >Alternative</option>
						<option value="oldies" >Oldies</option>
						<option value="techno" >Techno</option>
					</select>
				</td>
				<td width="80">
					<input type="button" value="Add New Item" />
				</td>
			</tr>
		</table>
		<table class="silent">
			<tr>
				<td width="220"></td>
				<td width="80">
					<input type="button" value="Select" />
				</td>
			</tr>
		</table>
		
	</fieldset>
	
	
	<fieldset>
		<legend>Item</legend>
		
		<table class="silent">
			<tr>
				<td width="300">
					<input type="text" name="searchclient" />
				</td>
				<td width="80">
					<input type="button" value="Search"/>
				</td>
			</tr>
			<tr>
				<td width="300">
					<select multiple name="music" size="10" >
						<option value="emo" selected>Emo</option>
						<option value="metal/rock" >Metal/Rock sdfg sdfg dsfg sdfg sdfgsfd</option>
						<option value="hiphop" >Hip Hop</option>
						<option value="ska" >Ska</option>
						<option value="jazz" >Jazz</option>
						<option value="country" >Country</option>
						<option value="classical" >Classical</option>
						<option value="alternative" >Alternative</option>
						<option value="oldies" >Oldies</option>
						<option value="techno" >Techno</option>
					</select>
				</td>
				<td width="80">
					<input type="button" value="Add New Item" />
				</td>
			</tr>
		</table>
		<table class="silent">
			<tr>
				<td width="220"></td>
				<td width="80">
					<input type="button" value="Select" />
				</td>
			</tr>
		</table>
		
	</fieldset>
	
	
	<fieldset>
		<legend>Time/Details</legend>
		
		<ul>
				<li>Creating a static (inline) datepicker</li>
				<li>Filling the entire grid with dates</li>
				<li>Enabling the selection of all dates rendered within the grid</li>
				<li>Testing the <code>enable</code> and <code>disable</code> methods</li>
			</ul>
			<label for="demo-10">Date</label> <input type="text" class="w16em" id="demo-10" name="demo-10" value="" />
			<button onclick="datePickerController.disable('demo-10'); return false;">Disable</button> <button onclick="datePickerController.enable('demo-10'); return false;">Enable</button> 
		</fieldset>
		<script>
datePickerController.createDatePicker({                            
				formElements:{"demo-10":"%d/%m/%Y"},
				showWeeks:true,
				statusFormat:"%l, %d %F %Y",
				staticPos:true,
				fillGrid:true,
				constrainSelection:false                  
				});
		</script>


</div>


