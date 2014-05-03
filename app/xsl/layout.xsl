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
			      <div class="modal-dialog">
			        <div class="modal-content">
			          <div class="modal-header">
			            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			            <h4 class="modal-title" id="addPlace">Ajouter une place</h4>
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