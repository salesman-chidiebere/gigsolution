	

				<footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
					<span>Copyright © 2021 Designed by <a href="" target="_blank" title="Chidiebere Edeh">(CE)</a> Chidiebere Edeh </span>
				</footer>
		

			<script type="text/javascript" src="js/vendor.js"></script>
			<script type="text/javascript" src="js/bundle.js"></script>
			
			<script>
                var myApp = new function () {
                    this.printTable = function () {
                        var tab = document.getElementById('tab');
                        var win = window.open('', '', 'height=700,width=700');
                        win.document.write(tab.outerHTML);
                        win.document.close();
                        win.print();
                    }
                }
            </script>
			
			<script>

                $(document).ready(function(){
                    $("#refresh").click(function(){
                        location.reload(true);
                    });
                });

            </script>
			
			
			<script>	
        		var price = <?php
        						require('dbmaster/config.php');
        						$query = mysqli_query($conx, "SELECT * FROM convegasprice");
        
        						if (mysqli_num_rows($query) > 0) {
        							
        							while($row = mysqli_fetch_assoc($query)) {
        								$price = $row['price'];	
        								echo $price;
        							}
        						}	
        					?>
        					
        	
        		var slider = document.getElementById("myRange");
        		
        		var output = document.getElementById("demo");
        		output.innerHTML = slider.value;
        		
        		var output2 = document.getElementById("demo2");
        		output2.innerHTML = slider.value * price;
        		
        		var amount = document.getElementById("amount");
        		amount.value = slider.value * price;
        		
        		var qnty = document.getElementById("qunty");
        		qnty.value = slider.value;
        
        		slider.oninput = function() {
        		  output.innerHTML = this.value;
        		  output2.innerHTML = slider.value * price;
        		  amount.value = slider.value * price;
        		  qnty.value = slider.value;
        		}
        		
        		qnty.oninput = function() {
        		  slider.value = this.value
        		  output.innerHTML = this.value;
        		  output2.innerHTML = this.value * price;
        		  amount.value = this.value * price;
        		}
        		
        	</script>
        	
        	
        	<script>
                function exportTableToExcel(tableID, filename = ''){
                    var downloadLink;
                    var dataType = 'application/vnd.ms-excel';
                    var tableSelect = document.getElementById("dataTable");
                    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
                    
                    // Specify file name
                    filename = filename?filename+'.xls':'excel_data.xls';
                    
                    // Create download link element
                    downloadLink = document.createElement("a");
                    
                    document.body.appendChild(downloadLink);
                    
                    if(navigator.msSaveOrOpenBlob){
                        var blob = new Blob(['\ufeff', tableHTML], {
                            type: dataType
                        });
                        navigator.msSaveOrOpenBlob( blob, filename);
                    }else{
                        // Create a link to the file
                        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
                    
                        // Setting the file name
                        downloadLink.download = filename;
                        
                        //triggering the function
                        downloadLink.click();
                    }
                }
                
            </script>
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
            
            <script type="text/javascript">
                function ExportTableToPDF() {
                    var sTable = document.getElementById('dataTable').innerHTML;

                    var style = "<style>";
                    style = style + "table {width: 100%;font: 17px Calibri;}";
                    style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
                    style = style + "padding: 2px 3px;text-align: center;}";
                    style = style + "</style>";
            
                    // CREATE A WINDOW OBJECT.
                    var win = window.open('', '', 'height=700,width=700');
            
                    win.document.write('<html><head>');
                    win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
                    win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
                    win.document.write('</head>');
                    win.document.write('<body>');
                    win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
                    win.document.write('</body></html>');
            
                    win.document.close(); 	// CLOSE THE CURRENT WINDOW.
            
                    win.print();    // PRINT THE CONTENTS.
                }
            </script>
        	
			
			<script>
              $('#pdfbtn').on('click',function(){
                $("#dataTable").tableHTMLExport({type:'pdf',filename:'Conve Nigeria Order Record.pdf'});
              })
              $('#jsonbtn').on('click',function(){
                $("#dataTable").tableHTMLExport({type:'json',filename:'Conve Nigeria Order Record.json'});
              })
              $('#csvbtn').on('click',function(){
                $("#dataTable").tableHTMLExport({type:'csv',filename:'Conve Nigeria Order Record.csv',});
              })
              $('#wordbtn').on('click',function(){
                $("#dataTable").tableHTMLExport({type:'docs',filename:'Conve Nigeria Order Record.docs'});
              })
              $('#txtbtn').on('click',function(){
                $("#dataTable").tableHTMLExport({type:'txt',filename:'Conve Nigeria Order Record.txt'});
              })
              $('#zipbtn').on('click',function(){
                $("#dataTable").tableHTMLExport({type:'zip',filename:'Conve Nigeria Order Record.zip'});
              })
            </script>
	</body>
</html>