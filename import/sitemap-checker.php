<?php
echo "Sitemap Checker";
if (isset($_GET['p'])) {

    $sitemapurl = $_GET['p'];

    //echo "URL-ul sitemapului este: " . $sitemapurl;

} else {

    echo "Parametrul 'p' lipsește din URL.";
}

$xml = simplexml_load_file($sitemapurl . "/page-sitemap.xml");


if ($xml === false) {
    die('Error loading XML');
}

$urls = [];

foreach ($xml->url as $url) {
    $urls[] = (string)$url->loc;
}
?>
    <style>
        h1 {
            margin-bottom: 2rem;
            font-size: 3rem;
            font-weight: bold;
        }
        h2 {
            margin-bottom: 2rem;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            padding: 2rem;
            border: 1px solid #ccc;
        }

        td {
            vertical-align: top;
        }
        td div {
            margin-bottom: 1rem;
        }

        td img {
            display: block;
            margin-top: 3rem;
        }

        td ul {
            column-count: 4;
            column-gap: 30px;
        }
        td a {
            text-decoration: underline;
        }
    </style>
    <table>
        <thead>
        <th>Data</th>
        <th>Headers</th>
        </thead>
        <tbody>
        <?php foreach ($urls as $url) : ?>
            <?php
            $metaInfo = getMetaInfo($url);
            $html = file_get_contents($url);
            // Extrageți tagurile h1, h2 și h3
            $result = extractHeadings($html);
            /*       foreach ($result as $tag => $headings) { */
            /*         echo "<h2>" . strtoupper($tag) . " tags:</h2>"; */
            /*         echo '<ul>'; */
            /*         foreach ($headings as $heading) { */
            /*           echo "<li> - $heading</li>"; */
            /*         } */
            /*         echo "</ul>"; */
            /*       } */
            ?>
            <tr>
                <td>
                    <h1><?php echo $metaInfo['title']; ?></h1>
                    <h2>Site url: <a href="<?php echo $metaInfo['url']; ?>"
                                     target="_blank"><?php echo $metaInfo['url']; ?></a></h2>
                    <?php if (strlen($metaInfo['meta_title']) > 0) : ?>
                        <div style='color: green;'><strong>Meta Title</strong>: <?php echo $metaInfo['meta_title']; ?>
                        </div>
                    <?php else : ?>
                        <div style='color: red;'><strong>Meta Title</strong>: Is missing!!!</div>
                    <?php endif; ?>
                    <?php if (strlen($metaInfo['meta_description']) > 0) : ?>
                        <div style='color: green;'><strong>Meta
                                Description</strong>: <?php echo $metaInfo['meta_description']; ?> </div>
                    <?php else : ?>
                        <div style='color: red;'><strong>Meta Description</strong>: Is missing</div>
                    <?php endif; ?>
                    <?php if (strlen($metaInfo['og_image'])) : ?>
                        <img width="500" src="<?php echo $metaInfo['og_image']; ?>" alt="">
                    <?php endif; ?>
                </td>
                <td>
                    <?php foreach ($result as $tag => $headings) : ?>
                        <h2><?php echo strtoupper($tag); ?>: tags:</h2>
                        <ul>
                            <?php foreach ($headings as $heading) : ?>
                                <li><?php echo $heading; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php
// Iterează prin fiecare URL și afișează meta title și meta description
/* foreach ($urls as $url) { */
/*   $metaInfo = getMetaInfo($url); ?> */

/*       echo "<strong>URL: <a href=" . $metaInfo['url'] . " target='_blank'>" . $metaInfo['url'] . "</a></strong><br>"; */
/*       if (strlen($metaInfo['meta_title']) > 0) { */
/*         echo "<div style='color: green;'><strong>Meta Title</strong>: " . $metaInfo['meta_title'] . "</div>"; */
/*       } else { */
/*         echo "<div style='color: red;'><strong>Meta Title</strong>: " . "Meta Title is missing" . "</div>"; */
/*       } */

/*       if (strlen($metaInfo['meta_description']) > 0) { */
/*         echo "<div style='color: green;'><strong>Meta Description</strong>: " . $metaInfo['meta_description'] . "</div>"; */
/*       } else { */
/*         echo "<div style='color: red;'><strong>Meta Description</strong>: " . "Meta Description is missing" . "</div>"; */
/*       } */

/*       // Încărcați conținutul HTML al paginii web */
/*       $html = file_get_contents($url); */

/*       // Extrageți tagurile h1, h2 și h3 */
/*       $result = extractHeadings($html); */

/*       // Afișați rezultatele */
/*       foreach ($result as $tag => $headings) { */
/*         echo "<h2>" . strtoupper($tag) . " tags:</h2>"; */
/*         echo '<ul>'; */
/*         foreach ($headings as $heading) { */
/*           echo "<li> - $heading</li>"; */
/*         } */
/*         echo "</ul>"; */
/*       } */
/*     } */


function extractHeadings($html)
{
    $doc = new DOMDocument();
    libxml_use_internal_errors(true);
    $doc->loadHTML($html);
    libxml_clear_errors();

    $headings = ['h1' => [], 'h2' => [], 'h3' => []];

    foreach (['h1', 'h2', 'h3'] as $tag) {
        $headingNodes = $doc->getElementsByTagName($tag);

        foreach ($headingNodes as $headingNode) {
            $headings[$tag][] = $headingNode->nodeValue;
        }
    }

    return $headings;
}

// Funcție pentru a extrage meta title și meta description pentru un URL dat
function getMetaInfo($url)
{
    // Inițializează un context stream pentru a gestiona solicitarea HTTP
    $context = stream_context_create(['http' => ['ignore_errors' => true]]);

    // Realizează solicitarea HTTP și obține conținutul paginii
    $pageContent = file_get_contents($url, false, $context);

    if ($pageContent === false) {
        // Tratează eroarea în cazul în care nu se poate obține conținutul paginii
        return [
            'title' => basename($url),
            'url' => $url,
            'meta_title' => 'Error: Unable to fetch page content',
            'meta_description' => '',
        ];
    }

    $title = basename($url);
    // Extrage meta title
    preg_match('/<title>(.*?)<\/title>/', $pageContent, $matches);
    $metaTitle = isset($matches[1]) ? $matches[1] : '';

    // Extrage meta description
    preg_match('/<meta\s+name="twitter:description"\s+content="(.*?)"\s*\/?>/', $pageContent, $matches);
    $metaDescription = isset($matches[1]) ? $matches[1] : '';

    // Etract og image
    preg_match('/<meta\s+property="og:image"\s+content="(.*?)"\s*\/?>/', $pageContent, $matches);
    $ogImage = isset($matches[1]) ? $matches[1] : '';

    return [
        'title' => $title,
        'url' => $url,
        'meta_title' => $metaTitle,
        'meta_description' => $metaDescription,
        'og_image' => $ogImage
    ];
}

