<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

	<xsl:import href="layout.xsl"/>

 	<xsl:template match="root/item">

	    <xsl:call-template name="layout">
	    		<xsl:with-param name="content">
	    			<div id="page-detail">
		    			<div class="col-md-3">
		    				<div class="page-header">
		    					<h2><xsl:value-of select="name"/></h2>
		    				</div>
		    				<div class="col-md-12">
		    					<p><strong><xsl:value-of select="address"/></strong></p>
		    				</div>
		    				<div class="col-md-12 space">
		    					<div class="col-md-6"><span class="label label-danger counter-rate">7/10</span></div>
		    					<div class="col-md-6"><span class="label label-success counter-comments">3 Avis</span></div>
		    				</div>
		    				<div class="col-md-12 space">
		    					<p><xsl:value-of select="description"/></p>
		    				</div>
		    				<div class="col-md-12 space">
		    					<div id="map-canvas">
		    						<xsl:attribute name="data-lat">
		    							<xsl:value-of select="latitude"/>
		    						</xsl:attribute>
		    						<xsl:attribute name="data-lng">
		    							<xsl:value-of select="longitude"/>
		    						</xsl:attribute>
		    					</div>
		    				</div>

		    			</div>
		    			<div class="col-md-9" id="comments-container">
		    				<div class="page-header overflow" id="page">
		    					<xsl:attribute name="data-place-id">
		    						<xsl:value-of select="id"/>
		    					</xsl:attribute>
		    					<h2 class="pull-left">Avis</h2>
		    					<button class="btn pull-right" data-toggle="modal" data-target="#addComment">Ajouter un commentaire</button>
		    				</div>
		    				<div class="item comment" style="min-height:145px">
		    					<div class="col-md-5">
		    						<h3 class="author">Avis de Michel Dupont</h3>
		    						<p><strong><span class="rate">0</span>/10</strong></p>
		    					</div>
		    					<div class="col-md-7">
		    						<p class="content"></p>
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
				          		<form id="add-comment">
				          			<input type="hidden" name="twon_id" id="place_id">
				          				<xsl:attribute name="value">
				          					<xsl:value-of select="id"/>
				          				</xsl:attribute>
				          			</input>
		                    		<div class="form-group">
		        	            	    <label for="author">Auteur</label>
		        	            	    <input type="text" name="author" id="author" class="form-control" placeholder="Auteur"/>
		        	            	  </div>
		        	            	  <div class="form-group">
		        	            	    <label for="rate">Note</label>
		        	            	    <!-- <input type="text" name="rate" id="rate" class="form-control" placeholder="Note"/> -->
		        	            	    <select class="form-control" name="rate" id="rate">
		        	            	    	<option></option>
		        	            	    	<option value="1">1</option>
		        	            	    	<option value="2">2</option>
		        	            	    	<option value="3">3</option>
		        	            	    	<option value="4">4</option>
		        	            	    	<option value="5">5</option>
		        	            	    	<option value="6">6</option>
		        	            	    	<option value="7">7</option>
		        	            	    	<option value="8">8</option>
		        	            	    	<option value="9">9</option>
		        	            	    	<option value="10">10</option>
		        	            	    </select>
		        	            	  </div>
		        	            	  <div class="form-group">
		        	            	    <label for="content">Content</label>
		        	            	    <textarea name="content"  id="content" class="form-control" rows="3"></textarea>
		        	            	  </div>
	        	            	</form>
				          </div>
				          <div class="modal-footer">
				            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				            <button type="button" class="btn btn-primary btn-add-comment">Save</button>
				          </div>
				        </div>
				      </div>
				    </div>
				   </div>
	    		</xsl:with-param>
	    </xsl:call-template>

 	</xsl:template>

</xsl:stylesheet>
