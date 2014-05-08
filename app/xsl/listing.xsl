<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

	<xsl:import href="layout.xsl"/>

 	<xsl:template match="root">


	    <xsl:call-template name="layout">
	    		<xsl:with-param name="content">
	    			<div id="page-listing">
		    			<div class="col-md-3">	
		    				<div class="page-header">
		    					<h2>Recherche</h2>
		    				</div>
		    				<form class="form-horizontal" role="form" method="get">	    					
		    					<div class="form-group">
		    						<label class="control-label col-sm-3">Pays</label>
		    						<div class="col-sm-9">
		    							<select class="form-control" id="countriesSelect"></select>
		    						</div>
		    					</div>
		    					<div class="form-group">
		    						<label class="control-label col-sm-3">Ville</label>
		    						<div class="col-sm-9">
		    							<select name="town_id" class="form-control" id="townsSelect"></select>
		    						</div>
		    					</div>
		    					<div class="form-group overflow">
		    						<input type="submit" class="btn pull-right" value="search"/>
		    					</div>
		    				</form>
		    			</div>
		    			<div class="col-md-9">
		    				<div class="page-header overflow">
		    					<h2 class="pull-left">Listing</h2>
		    					<button class="btn pull-right" data-toggle="modal" data-target="#addPlace">Ajouter un lieu</button>
		    				</div>
		    				<xsl:for-each select="item">
							    <xsl:call-template name="item"/>
		    				</xsl:for-each>		
		    			</div>
		    		</div>
	    		</xsl:with-param>
	    </xsl:call-template>

 	</xsl:template>


	<xsl:template name="item">
  		<div class="item">
  			<div class="col-md-5">
  				<h3>
  					<a>
  						<xsl:attribute name="href">  							
					    	<xsl:value-of select="concat('detail.php?id=', id)" />
					   	</xsl:attribute>
  						<xsl:value-of select="name"/>
  					</a>
  				</h3>
  				<div class="col-md-6"><strong>7/10</strong></div>
  				<div class="col-md-6">3 Avis</div>
  			</div>
  			<div class="col-md-6" style="min-height:150px;">
  				<p><strong><xsl:value-of select="address"/></strong></p>
  				<p>
  				 	<xsl:value-of select="description"/>
  				</p>
  			</div>
  			<div class="col-md-1">
  				<a class="btn btn-danger btn-sm">
					<xsl:attribute name="href">  							
			    		<xsl:value-of select="concat('delete.php?id=', id)" />
			   		</xsl:attribute>
			   		<span class="glyphicon glyphicon-remove"></span>
  				</a>
  			</div>
  		</div>
 	</xsl:template>

</xsl:stylesheet>
