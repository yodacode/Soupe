<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template name="layout">
  	<xsl:param name="content" />
    <xsl:text>Header</xsl:text>
    	<xsl:copy-of select="$content"/>
    <xsl:text>footer</xsl:text>
  </xsl:template>

</xsl:stylesheet>