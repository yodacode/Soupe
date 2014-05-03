<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template name="layout">
  	<xsl:param name="content" />
 		<html>
 			<head>
			    <meta charset="utf-8"/>
			    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
			    <meta name="viewport" content="width=device-width, initial-scale=1"/>
			    <title>App : Listing</title>
			    <!-- Bootstrap -->
			    <link href="../app/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
			    <style type="text/css">
			      .overflow {
			        overflow: hidden;
			      }
			    </style>
	  		</head>
	  		<body>

	  		<div class="container">
	  			<h1>SOAP REST</h1>
    			<xsl:copy-of select="$content"/>
    		</div>


	  		<!-- Modal -->
			    <div class="modal fade" id="addPlace" tabindex="-1" role="dialog" aria-labelledby="addPlace" aria-hidden="true">
		            <form action="add.php" method="post">
				      	<div class="modal-dialog">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					            <h4 class="modal-title" id="addPlace">Ajouter une place</h4>
					          </div>
					          <div class="modal-body">
					            	<div class="form-group">
					            	    <label for="name">Nom</label>
					            	    <input type="text" name="name" class="form-control" id="name" placeholder="Nom de la place"/>
					            	  </div>
					            	  <div class="form-group">
					            	    <label for="address">Addresse</label>
					            	    <input type="text" name="address" class="form-control" id="address" placeholder="address"/>
					            	  </div>
					            	  <div class="form-group">
					            	    <label for="latitude">Latitude</label>
					            	    <input type="text" name="latitude" class="form-control" id="latitude" placeholder="latitude"/>
					            	  </div>
					            	  <div class="form-group">
					            	    <label for="longitude">Longitude</label>
					            	    <input type="text" name="longitude" class="form-control" id="longitude" placeholder="longitude"/>
					            	  </div>
					            	  <div class="form-group">
					            	    <label for="address">Description</label>
					            	    <textarea name="description" class="form-control" rows="3"></textarea>
					            	  </div>
					            	  <div class="form-group">					            	  	
					            	  	
					            	  		<select name="town_id" class="form-control">
					            	  		  <option value="1">1</option>					            	  		  
					            	  		  <option value="1">Marseille</option>					            	  		  
					            	  		  <option value="1">Marseille</option>					            	  		  
					            	  		  <option value="1">Marseille</option>					            	  		  
					            	  		  <option value="1">Marseille</option>					            	  		  
					            	  		</select>
					            	  	
					            	  </div>
					          </div>
					          <div class="modal-footer">
					            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					            <button type="submit" class="btn btn-primary">Save</button>
					          </div>
					        </div>
					      </div>
		            </form>
			    </div>

			    <!-- Modal -->
			    <div class="modal fade" id="addComment" tabindex="-1" role="dialog" aria-labelledby="addComment" aria-hidden="true">
			      <div class="modal-dialog">
			        <div class="modal-content">
			          <div class="modal-header">
			            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			            <h4 class="modal-title" id="addComment">Ajouter un commentaire</h4>
			          </div>
			          <div class="modal-body">
			            ...
			          </div>
			          <div class="modal-footer">
			            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			            <button type="button" class="btn btn-primary">Save</button>
			          </div>
			        </div>
			      </div>
			    </div>


			    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			    <script src="../app/jquery/jquery.min.js"></script>
			    <!-- Include all compiled plugins (below), or include individual files as needed -->
			    <script src="../app/bootstrap/js/bootstrap.min.js"></script>
			    <script type="text/javascript" src="../app/js/App.js"></script>

		    </body>
  		</html>

  </xsl:template>

</xsl:stylesheet>