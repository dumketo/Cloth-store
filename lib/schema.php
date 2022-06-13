<?php
global $dumketo;
return $dumketo['activate_schema'] ?? 'default value';
if ( $dumketo['activate_schema']==1 ):
    add_action ( 'wp_head', 'Schema_info' );
    function Schema_info() {
        global $dumketo;
    ?>
        <script type="application/ld+json">
            {
              "@context": "http://schema.org",
              "@type": "Organization",
              "url": "<?php echo get_home_url(); ?>",
              "logo": "<?php echo $dumketo['logo']['url']; ?>",
              "sameAs" : [ "<?php echo $dumketo['facebook']; ?>",
               "<?php echo $dumketo['instagram']; ?>"]
            }
        </script>
        <?php
        if ( $dumketo['schema_type'] ):
            foreach($dumketo['schema_type'] as $schema) {
        ?>
            <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "<?php echo $schema['title']; ?>",
                "url": "<?php echo get_home_url(); ?>",
                "image": "<?php echo $dumketo['logo']['url']; ?>",
                "name": "<?php echo $schema['name']; ?>",
                "description": "<?php echo $schema['description']; ?>", 
                "priceRange": "$",
                <?php if( $schema['title']=='Restaurant' ) { ?>"servesCuisine" : "Burger shop,Fish and chip shop",<?php } ?>
                "telephone": "<?php echo $dumketo['phone']; ?>",
                "email": "<?php echo $dumketo['email']; ?>",
                "address":{
                    "@type":            "PostalAddress",
                    "streetAddress":    "<?php echo trim( $dumketo['streetAddress'] ); ?>",
                    "addressLocality":  "<?php echo trim( $dumketo['addressLocality'] ); ?>",
                    "addressRegion":    "<?php echo trim( $dumketo['addressRegion'] ); ?>",
                    "postalCode":       "<?php echo trim( $dumketo['postalCode'] ); ?>"
                }
            }
            </script>
        <?php
        } endif;
    }
endif;