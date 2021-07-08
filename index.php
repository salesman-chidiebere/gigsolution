<?php
	require('dbmaster/config.php');
	session_start();
	
	if(isset($_POST["add-gig"])){
    		
    		$data0= date("Y-m-d H:i:s");
    		$data1=  $_POST["role"];
    		$data2 = $_POST['company'];
			$data4 = $_POST['country'];
            $data5 = $_POST['region'];
			$data3 = $data5 . ", " . $data4;
            $data6 = $_POST['tags'];
            $data7 = $_POST['min_salary'];
			$data8 = $_POST['max_salary'];
			$data9 = $_SESSION['loginuser'];
			$data10 = $_POST['address'];

                            
            $query = mysqli_query($conx, "INSERT INTO gigtable (date, role, company, location, country, region, tag, min_salary, max_salary, owner, address) 
								VALUES ('$data0', '$data1', '$data2', '$data3', '$data4', '$data5', '$data6', '$data7', '$data8', '$data9', '$data10')");
    					
        	if ($query){
        	    echo "<script type='text/javascript'>";
                echo "alert('New gig add successfull')";
                echo "</script>";
        	}else{
                echo "Error: "  . "<br>" . mysqli_error($conx);
    		    mysqli_close($conx);
            }
        } 
		
		
		if(isset($_POST["del-gig"])){
			$data1=  $_POST["del-gig"];
			
			$query = mysqli_query($conx, "DELETE FROM gigtable WHERE id='".$data1."'");
			
			if ($query){
        	    echo "<script type='text/javascript'>";
                echo "alert('Gig deleted successfully')";
                echo "</script>";
        	}else{
                echo "Error: "  . "<br>" . mysqli_error($conx);
    		    mysqli_close($conx);
            }
		}

	include('include/header.php');
	echo $_SESSION['loginuser'];
	
	
?>
<link href="css/tagger.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/nav2.css">
<link rel="stylesheet" type="text/css" href="css/tab.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style>
	#dataTable_length{
		display:none;
	}
	#dataTable_filter{
		display:none;
	}
	
	/* Float four columns side by side */
	.column {
	  float: left;
	  padding: 0 10px;
	}

	/* Remove extra left and right margins, due to padding */
	.row {margin: 0 -5px;}

	/* Clear floats after the columns */
	.row:after {
	  content: "";
	  display: table;
	  clear: both;
	}

	/* Responsive columns */
	@media screen and (max-width: 600px) {
	  .column {
		width: 100%;
		display: block;
		margin-bottom: 20px;
	  }
	}

	/* Style the counter cards */
	.card {
	  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	  padding: 16px;
	  text-align: center;
	  background-color: #ffffff;
	}


	nav a {
	  list-style: none;
	  padding: 35px;
	  color: #FFA500;
	  font-size: 1.1em;
	  display: block;
	  transition: all 0.5s ease-in-out;
	}

	.rightbox {
	  padding: 0em 34rem 0em 0em;
	  height: 100%;
	}

	.rb-container {
	  font-family: "PT Sans", sans-serif;
	  width: 100%;
	  margin: auto;
	  display: block;
	  position: relative;
	  cursor: pointer;
	}

	.rb-container ul.rb {
	  margin: 1.5em 0;
	  padding: 0;
	  display: inline-block;
	}

	.rb-container ul.rb li {
	  list-style: none;
	  margin: auto;
	  margin-left: 0;
	  min-height: 50px;
	  border-left: 1px solid grey;
	  padding: 0 0 5px 3px;
	  position: relative;
	}

	.rb-container ul.rb li:last-child {
	  border-left: 0;
	}

	.rb-container ul.rb li::before {
	  position: absolute;
	  left: -18px;
	  top: -5px;
	  content: " ";
	  border: 8px solid rgba(253, 253, 253, 1);
	  border-radius: 500%;
	  background: #50d890;
	  height: 20px;
	  width: 20px;
	  transition: all 500ms ease-in-out;
	}

	.active, .rb-container ul.rb li:hover::before {
	  border-color: #FFA500;
	  transition: all 1000ms ease-in-out;
	}

	ul.rb li .timestamp {
	  color: #333;
	  position: relative;
	  width: 100px;
	  font-size: 12px;
	}
	
	ul.rb li .timestamp:hover {
		color: #FFA500;
	}
	

	table td.shrink {
		white-space:nowrap
	}
	table td.expand {
		width: 99%
	}
	
	td{
		padding:0.5%;
	}
	
	.tagger + .tagger {
		margin-top: 10px;
	}
	
	.btnz{
		width: 13.5%;
		margin-right:2%;
		border-radius:10px;
		background-color:transparent;
		color:#777;
		border:1px solid grey;
		text-align:left;
	}
	
	.btnz:focus, .btnz:hover {
		border: 1px solid orange;
		color: orange;
	}
	
	



	
</style>
<main class="main-content bgc-grey-100">
	<div id="mainContent">
						
		<div class="tabs" id="id00">
					
			<div style="margin:0 10px 30px 30px;">
				<button class="btn btn-default" type="button" onclick="showModal();" data-toggle="dropdown" style="background-color:#000080; height:30px; width:100px; float:right; margin-right:1px;">
					<span>New gig &nbsp; <i class="fa fa-plus"></i></span>
				</button>
				<span class="c-grey-900 mB-20" style="margin-left:5px; font-size:2.2em; font-weight: bold;"> Gigs</span>
			</div>

			<input type="radio" id="tab1" name="tab-control" checked>
			<input type="radio" id="tab2" name="tab-control">
			<input type="radio" id="tab3" name="tab-control">
			<ul>
				<li title="Features"><label for="tab1" role="button"><br><span>All gigs</span></label></li>
				<li title="Delivery Contents"><label for="tab2" role="button"><br><span>My gigs</span></label></li>
				<li title="Shipping"><label for="tab3" role="button"><br><span>Rejected gigs</span></label></li>
			 </ul>

			<div class="slider1" >
				<div class="indicator"></div>
			</div>
			<hr>
			<div class="content">
				<section>
				  <h2>Features</h2>
				  
				  <div style="padding:10px;">
					<button class="btnz"><i class="fa fa-meetup"></i>  Freelance</button>
					<button class="btnz"><i class="fa fa-key"></i>  Keywords</button>
					<button class="btnz"><i class="fa fa-map-marker"></i>  Location</button>
					<button class="btnz"><i class="fa fa-globe"></i>  Remote friendly</button>
					<button class="btnz"><i class="fa fa-dashboard"></i>  Design</button>
					<button class="btnz"><i class="fa fa-gift"></i>  Contract</button>
				  </div>
						  
				  <div id="datatable" style="padding:2%;">
					    <table id="dataTable" class="table table-striped table-bordered" cellspacing="1" width="100%" border="1" cellpadding="3" style="display:table;">
							<thead>
								<tr><th>   </th><th>Role</th><th>Company</th><th>Date</th><th>Salary</th><th>   </th></tr>
							</thead>

							<tbody>
								    
								<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="width:100%; border:0;">
									
									    <?php

										require('dbmaster/config.php');
										
										$sql = "SELECT * FROM gigtable";
										$result = mysqli_query($conx, $sql);
										
										if (mysqli_num_rows($result) > 0) {
										
											while($row = mysqli_fetch_assoc($result)) {
											
											echo "<tr><td><input type='checkbox' id='table_row' name='tbl_row' value='" .$row['id']."'></td><td>" .$row['role']. "</td><td>" .$row['company']. "</td><td>" .$row['date']
											 ."</td><td>" .$row['min_salary']." - " .$row['max_salary']
											."</td> <td>";
											
										
											
											echo "<a href='' class='delbutton'  style='padding:0px; background-color:orange; color:darkorange'
    											onclick=\"javascript: return confirm('Are you sure you want to delete this gig?');\" title='Click To Confirm Order' >
    											<button	class='btn btn-error btn-mini' style='text-align:center;padding:0px;height:25px;padding:2px;float:right; color:#FF8C00; background-color:#D8BFD8' 
												name='del-gig' value='".$row['id']."'>Delete</button></a> 
											
											
											 
											 
											
											
											</td>";
											echo "</tr>";
											}
											echo"<tfoot style='height:20px';></tfoot>";
											
											//this was removed from the detail button (onclick='getVendorss(this.value); return false;')
											
										} else {
											echo "0 results";
										}
										
										
										mysqli_close($conx);	
									?>
									
									</form>
									
							</tbody>
								
							<tfoot>
								<tr><th>  </th><th>Role</th><th>Company</th><th>Date</th><th>Salary</th><th></th></tr>
							</tfoot>
								
						</table>
					</div>
							  
				</section>
							
				<section>
				  <h2>Delivery Contents</h2>
					 
					 
					 <div id="datatable">
					    <table id="dataTable" class="table table-striped table-bordered" cellspacing="1" width="100%" border="1" cellpadding="3" style="display:table;">
							<thead>
								<tr><th>   </th><th>Role</th><th>Company</th><th>Date</th><th>Salary</th><th>   </th></tr>
							</thead>

							<tbody>
								    
								<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="width:100%; border:0;">
									
									    <?php

										require('dbmaster/config.php');
										
										$sql = "SELECT * FROM gigtable WHERE owner= '".$_SESSION['loginuser']."'";
										$result = mysqli_query($conx, $sql);
										
										if (mysqli_num_rows($result) > 0) {
										
											while($row = mysqli_fetch_assoc($result)) {
											
											echo "<tr><td><input type='checkbox' id='table_row' name='tbl_row' value='" .$row['id']."'></td><td>" .$row['role']. "</td><td>" .$row['company']. "</td><td>" .$row['date']
											 ."</td><td>" .$row['min_salary']." - " .$row['max_salary']
											."</td> <td>";
											
										
											
											echo "<a href='' class='delbutton'  style='padding:0px; background-color:orange; color:darkorange'
    											onclick=\"javascript: return confirm('Are you sure you want to delete this gig?');\" title='Click To Confirm Order' >
    											<button	class='btn btn-error btn-mini' style='text-align:center;padding:0px;height:25px;padding:2px;float:right; color:#FF8C00; background-color:#D8BFD8' 
												name='del-gig' value='".$row['id']."'>Delete</button></a> 
											
											
											 
											 
											
											
											</td>";
											echo "</tr>";
											}
											echo"<tfoot style='height:20px';></tfoot>";
											
											//this was removed from the detail button (onclick='getVendorss(this.value); return false;')
											
										} else {
											echo "0 results";
										}
										
										
										mysqli_close($conx);	
									?>
									
									</form>
									
							</tbody>
								
							<tfoot>
								<tr><th>  </th><th>Role</th><th>Company</th><th>Date</th><th>Salary</th><th></th></tr>
							</tfoot>
								
						</table>
					</div>
				</section>
				<section>
				  <h2>Shipping</h2>
					Rejected Gigs will be shown here.
				</section>
			</div>
		</div>
						
					

		<div class="tabs" id="id01" style="display:none;">
			<div style="margin:0 10px 30px 30px;">
				<span class="c-grey-900 mB-20" style="font-size:1.2em; font-weight: bold;"> New Gigs</span>
			</div>
			<div class="row">
			  <div class="column" style="width: 25%;">
				<div class="card">

						<div class="rb-container">
						  <ul class="rb">
							<li class="rb-item" ng-repeat="itembx">
							  <div class="timestamp">
								<a onclick="showModal1();">Basic Data</a>
							  </div>
							</li>
							<li class="rb-item" ng-repeat="itembx">
							  <div class="timestamp">
							  <a id="check1" onclick="showModal2();">Renumeration</a>
							  </div>
							</li>
						  </ul>

						</div>

				</div>
			  </div>
			  
			  <form style="width:75%; border:none;" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

				<div class="column" style="width: 100%;" id="id11">
					<div class="card">
						
						<table border="0" style="width:100%;border:0px;text-align:left; padding:10%;">
							<tr><td style="padding-left:2%">Role</td><td style="padding-left:2%">Company</td></tr>
								<tr>
									<td><input type="text" name="role" required></td>
									<td><input type="text" name="company" required></td>
								</tr>
								<tr><td style="padding-left:2%">Location</td></tr>
								<tr>
									<td>
										<select class="form-select" aria-label="Default select example" style="width:90%; margin-left:3%" name="country" required>
										  <option selected>Country</option>
										  <option value="nigeria">Nigeria</option>
										  <option value="us">United State</option>
										  <option value="canada">Canada</option>
										</select>
									</td>
									<td>
										<select class="form-select" aria-label="Default select example" style="width:90%; margin-left:3%" name="region" required>
										  <option selected>State/Region</option>
										  <option value="east">East</option>
										  <option value="west">West</option>
										  <option value="north">North</option>
										  <option value="south">South</option>
										</select>
									</td>
								</tr>
								<tr>
									<br>
									<td colspan="2"><input type="text" placeholder="Address" name="address" required /></td>
								</tr>
								<tr>
									<td style="padding-left:2%">Add Tag</td>
								</tr>
								<tr style="width:50%">
									<td colspan="2"><input type="text" value="" name="tags" style="width:50%;" required /></td>
								</tr>
								<tr>
									<td colspan="3" ><span style="margin-left:1%;">Suggested tags: &nbsp;<u>Full time</u> &nbsp;<u>Contract</u> &nbsp;<u>Freelance</u></span></td>
								</tr>
								
								<tr>
									<td></td>
									<td>
										
										<button class="btn btn-default" id="check1" type="button" onclick="showModal2();" data-toggle="dropdown" style="background-color:#000080; height:30px; width:100px; float:right; margin-right:10px;">
											<span>Continue </span>
										</button>
										<button class="btn btn-default" type="button" onclick="closeModal();" data-toggle="dropdown" style="background-color:#999; height:30px; width:100px; float:right; margin-right:1px;">
											<span>Cancel </span>
										</button>
									</td>
								</tr>
						</table>
					  
					</div>
				</div>
			  
			  <div class="column" style="width: 100%; display:none;" id="id22">
				<div class="card">
						<table border="0" style="width:100%;border:0px;text-align:left; padding:10%;">
							
							<tr><td style="padding-left:2%">Salary</td><td style="padding-left:2%"></td></tr>
							<tr>
								<td><input id="min" type="number" placeholder="Minimum" name="min_salary" value="0"></td>
								<td><input id="max" type="number" placeholder="Maximum" name="max_salary" value="0"></td>
							</tr>
							
							<tr>
								
							</tr>
							
							<tr>
								<td></td>
								<td>
									
									
								</td>
							</tr>
						</table>
							<div>
								<button class="btn btn-default" type="submit" name="add-gig" style="background-color:#000080; height:30px; width:100px; float:right; margin-right:10px;">
										<span>Add gig </span>
									</button>
				
									<button class="btn btn-default" type="button" onclick="showModal1();" data-toggle="dropdown" style="background-color:#999; height:30px; width:100px; float:right; margin-right:1px;">
										<span>Back </span>
									</button>
							</div>
					
				</div>
			  
            </div>
		</div>


					
		</div>


								
									
			<script src="js/tagger.js"></script>
			<script>
			  var t1 = tagger(document.querySelector('[name="tags"]'), {
				  allow_duplicates: false,
				  allow_spaces: true,
				  add_on_blur: true,
				  tag_limit: 4,
				  completion: {list: ['Full Time', 'Contract', 'Freelance']}
			  });
			  var t2 = tagger(document.querySelector('[name="tags2"]'), {
				  allow_duplicates: false,
				  allow_spaces: true,
				  completion: {
					  list: function() {
						  return Promise.resolve(['foo', 'bar', 'baz', 'foo-baz']);
					  }
				  },
				  link: function() { return false; }
			  });
			  var t3 = tagger(document.querySelectorAll('[name^="tags3"]'), {
				  allow_duplicates: false,
				  allow_spaces: true,
				  link: function(name) {
					  return `javascript:alert('${name}');`;
				  }
			  });
			</script>
			
			<script>
				document.getElementById("check1").onclick = function() {
				  let allAreFilled = true;
				  document.getElementById("id11").querySelectorAll("[required]").forEach(function(i) {
					if (!allAreFilled) return;
					if (!i.value) allAreFilled = false;
					if (i.type === "radio") {
					  let radioValueCheck = false;
					  document.getElementById("id11").querySelectorAll(`[name=${i.name}]`).forEach(function(r) {
						if (r.checked) radioValueCheck = true;
					  })
					  allAreFilled = radioValueCheck;
					}
				  })
				  if (!allAreFilled) {
					alert('Fill all the fields');
				  }else{
					  showModal2();
				  }
				};
			</script>
			
			<script>
                // Get the modal
                var modal = document.getElementById('id01');
                    
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
						document.getElementById("id00").style.display="block";
                    }
                }
            </script>
            
            
            <script>
                function closeModal(){
					document.getElementById("id00").style.display="block";
                    document.getElementById("id01").style.display="none";
         
                    //location.reload(true);
					
                }
            </script>
            <script>
				function showModal(){
                    document.getElementById("id01").style.display="block";
					document.getElementById("id00").style.display="none";
                }
				
                function showModal1(){
                    document.getElementById("id11").style.display="block";
					document.getElementById("id22").style.display="none";
                }
				
				function showModal2(){
                    document.getElementById("id11").style.display="none";
					document.getElementById("id22").style.display="block";
                }
            </script>
            
            <script>
                var input = $('[name="qty"],[name="price"]'),
                input1 = $('[name="min_salary"]'),
                input2 = $('[name="mas"]'),
                input3 = $('[name="total"]');
                input.change(function () {
                    var val1 = (isNaN(parseFloat(input1.val()))) ? 0 : parseFloat(input1.val());
                    var val2 = (isNaN(parseFloat(input2.val()))) ? 0 : parseFloat(input2.val());
                    input3.val(val1 * val2);
                });
            </script>
			
			<script>
				var focus = 0,
				  blur = 0;
				$( "#max" )
				  .focusout(function() {
					//focus++;
					//$( "#focus-count" ).text( "focusout fired: " + focus + "x" );
					var from = parseInt($("#min").val());
					  var to = parseInt($("#max").val());
					  if(to < from)
					  {
						 alert("Max Salary must be greater than Min Salary");
					  }
					  else 
					  {
						 //submit form
					  }
					
				  })
				  .blur(function() {
					blur++;
					$( "#blur-count" ).text( "blur fired: " + blur + "x" );
				  });
				</script>
            

<?php
	include('include/footer.php');
?>