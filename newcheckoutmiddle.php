<div id="middle">
	<!-- <h1>New Checkout</h1> -->
	<form action = "newcheckout_db.php" method = "post">
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
						<input type="button" value="Add New Client" />
					</td>
				</tr>
			</table>
			<table class="silent align="right" >
				<tr>
					<td width="80">
						<input type="button" value="Select"/>
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
			<table class="silent align="right" >
				<tr>
					<td width="80">
						<input type="button" value="Clear"/>
					</td>
					<td width="80">
						<input type="button" value="Add"/>
					</td>
				</tr>
		 </table>
			
		</fieldset>
		
		
		<fieldset>
			<legend>Time/Details</legend>
			
			<!-- Checkout Date -->
			<table class="silent">
				<tr>
					<td width="115">
						<label for="comm">Checkout Date:</label>
					</td>
					<td width="180">
						<input type="text" class="w2em" id="comm" name="comm" value="" maxlength="2" placeholder="MM" />
						/
						<input type="text" class="w2em" id="codd" name="codd" value="" maxlength="2" placeholder="DD" />
						/
						<input type="text" class="w4em" id="coyr" name="coyr" value="" maxlength="4" placeholder="YYYY" />
					</td>
				</tr>
				<tr>
					<td width="115">
						<label for="cohh">Checkout Time:</label>
					</td>
					<td width="180">
						<input type="text" class="w2em" id="cohh" name="cohh" value="" maxlength="2" placeholder="HH" />
						:
						<input type="text" class="w2em" id="comm" name="comm" value="" maxlength="2" placeholder="MM" />
			
					</td>
				</tr>
				<tr>
					<td width="115">
						<label for="rtmm">Return Date:</label>
					</td>
					<td width="180">
						<input type="text" class="w2em" id="rtmm" name="rtmm" value="" maxlength="2" placeholder="MM" />
						/
						<input type="text" class="w2em" id="rtdd" name="rtdd" value="" maxlength="2" placeholder="DD" />
						/
						<input type="text" class="w4em" id="rtyr" name="rtyr" value="" maxlength="4" placeholder="YYYY" />			
					</td>
				</tr>
				<tr>
					<td width="115">
						<label for="rthh">Return Time:</label>
					</td>
					<td width="180">
						<input type="text" class="w2em" id="rthh" name="rthh" value="" maxlength="2" placeholder="HH" />
						:
						<input type="text" class="w2em" id="rtmm" name="rthh" value="" maxlength="2" placeholder="MM" />
					</td>
				</tr>
			</table>
			
			<label for="comments">Comments:</label>
			<textarea rows="4" cols="55" placeholder:"Details Regarding Checkout"></textarea>
			
			<table class="silent" align="right" >
				<tr>
					<td width="80">
						<input type="button" value="Clear"/>
					</td>
					<td width="80">
						<input type="button" value="Add"/>
					</td>
				</tr>
		 </table>
	 </fieldset>
	 
	 
	</form>
	<p>&nbsp; </p>
</div>

<script>
datePickerController.createDatePicker({                            
        // Associate the three text inputs to their date parts 
        formElements:{"coyr":"%Y","comm":"%m","codd":"%d"},
        // Show the week numbers
        showWeeks:true,
        // Set a statusbar format
        statusFormat:"%l, %F %d %Y", 
        // Fill the entire grid with dates
        fillGrid:true,
        // Enable the selection of dates not within the current month
        // but rendered within the grid (as we used fillGrid:true)
        constrainSelection:false
        });
</script>
	
<script>
datePickerController.createDatePicker({                            
        // Associate the three text inputs to their date parts 
        formElements:{"rtyr":"%Y","rtmm":"%m","rtdd":"%d"},
        // Show the week numbers
        showWeeks:true,
        // Set a statusbar format
        statusFormat:"%l, %F %d %Y", 
        // Fill the entire grid with dates
        fillGrid:true,
        // Enable the selection of dates not within the current month
        // but rendered within the grid (as we used fillGrid:true)
        constrainSelection:false
        });
</script>
