<link rel="stylesheet" media="all" href="agczoneonesheet.css" />
<script type="text/javascript" src="Lazy.js"></script>
<script type="text/javascript" src="mootools.js"></script>

<?php
$api = "AKIAIFPIOCDPYGP2XFJA";
$secretkey = "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";
$tag = "clotingsshopp-20";
$region = "com";
$department="All";
$query=$_GET['kw'];
function AGCZone_XML($tag, $api, $secretkey, $region, $department, $query)
{
	$time = time() + 10000;
	$method = 'GET';
	$host = 'webservices.amazon.'.$region;
	$uri = '/onca/xml';
	$slug["Service"] = "AWSECommerceService";
	$slug["Operation"] = "ItemSearch";
	$slug["SubscriptionId"] = $api;
	$slug["AssociateTag"] = $tag;
	$slug["SearchIndex"] = $department;
	$slug["Condition"] = 'All';
	$slug["Keywords"] = $query;
	$slug["ItemPage"] = 1;
	$slug["TruncateReviewsAt"] = '500'; // silahkan ganti sesuai keinginan
	$slug["ResponseGroup"] = 'Images,ItemAttributes,EditorialReview'; // Silahkan check di Amazon API Untuk mengganti scheme responnya.
	$slug["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z",$time);
	$slug["Version"] = "2011-08-01";
	ksort($slug);
	$query_slug = array();
	foreach ($slug as $slugs=>$value)
	{
		$slugs = str_replace("%7E", "~", rawurlencode($slugs));
		$value = str_replace("%7E", "~", rawurlencode($value));
		$query_slug[] = $slugs."=".$value;
	}
	$query_slug = implode("&", $query_slug);
	$signinurl = $method."\n".$host."\n".$uri."\n".$query_slug;
	$signature = base64_encode(hash_hmac("sha256", $signinurl, $secretkey, True));
	$signature = str_replace("%7E", "~", rawurlencode($signature));
	$request = "http://".$host.$uri."?".$query_slug."&Signature=".$signature;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $request);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	$response = curl_exec($ch);
	curl_close($ch);
	return $response;
}
function AGCZoneContent()
{
	$tag = "clotingsshopp-20";
	$api = "AKIAIFPIOCDPYGP2XFJA";
	$sec = "57omWIicxyWOlm4Wfv08AwjEy7M4MTfeFMMn7l3x";
	$reg = "com";
	$dep = "All";
	$query=$_GET['kw'];
	




////////////////////////
	$ama = AGCZone_XML($tag, $api, $sec, $reg, $dep, $query);
	if(@simplexml_load_string($ama))
	{
		$xmlzone = new SimpleXmlElement($ama, LIBXML_NOCDATA);
		$fetsaya = $xml->ItemAttributes->Feature;
		$xml = $xmlzone->Items->Item;
		
		$result = '<div class="agczone-thumbnail"><center><a href="http://www.amazon.'.$reg.'/gp/product/'.$xml[0]->ASIN.'/'.$tag.'" rel="nofollow" target="_blank"><img class="agczone-left" src="'.$xml[0]->LargeImage->URL.'" data-src="'.$xml[0]->LargeImage->URL.'" width="'.$xml[0]->LargeImage->Width.'" height="'.$xml[0]->LargeImage->Height.'" alt="'.$xml[0]->ItemAttributes->Title.'" /></a></center></div>' . "\n";
		$result .= '<div class="agczone-details">' . "\n";
		$result .= '<table class="agczone-table" align="center">';
		$result .= '<tbody>';
		$result .= '<tr style="background:#eee;width:100%;">' . "\n";
		$result .= '<td class="agczone-td">Check Price </td>' . "\n";
		$result .= '<td>:</td>' . "\n \n";
		$result .= '<td class="agczone-td">'.$xml[0]->ItemAttributes->ListPrice->FormattedPrice.'</td>' . "\n";
		$result .= '</tr>' . "\n";
		$result .= '<tr style="background:#fff;">' . "\n";
		$result .= '<td class="agczone-td">Brand</td>' . "\n";
		$result .= '<td>:</td>' . "\n";
		$result .= '<td class="agczone-td">'.$xml[0]->ItemAttributes->Brand.'</td>' . "\n";
		$result .= '</tr>' . "\n";
		$result .= '<tr style="background:#eee;">' . "\n";
		$result .= '<td class="agczone-td">Binding</td>' . "\n";
		$result .= '<td>:</td>' . "\n";
		$result .= '<td class="details">'.$xml[0]->ItemAttributes->Binding.'</td>' . "\n";
		$result .= '</tr>' . "\n";
		$result .= '<tr style="background:#fff;">' . "\n";
		$result .= '<td class="agczone-td">Color</td>' . "\n";
		$result .= '<td>:</td>' . "\n";
		$result .= '<td class="agczone-td">'.$xml[0]->ItemAttributes->Color.'</td>' . "\n";
		$result .= '</tr>' . "\n";
		$result .= '<tr style="background:#eee;">' . "\n";
		$result .= '<td class="agczone-td">Model</td>' . "\n";
		$result .= '<td>:</td>' . "\n";
		$result .= '<td class="agczone-td">'.$xml[0]->ItemAttributes->Model.'</td>' . "\n";
		$result .= '</tr>' . "\n";
		$result .= '<tr style="background:#fff;">' . "\n";
		$result .= '<td class="agczone-td">SKU</td>' . "\n";
		$result .= '<td>:</td>' . "\n";
		$result .= '<td class="agczone-td">'.$xml[0]->ItemAttributes->SKU.'</td>' . "\n";
		$result .= '</tr>' . "\n";
		$result .= '</tbody>' . "\n";
		$result .= '</table>' . "\n";
		$result .= '</div><br/>' . "\n";
		$result .= '<div style="clear:both"></div><br/>' . "\n";
		$result .= '<p style="text-align:center"><a href="http://www.amazon.'.$reg.'/gp/product/'.$xml[0]->ASIN.'/'.$tag.'" rel="nofollow" target="_blank">BUY</a></p>' . "\n";
               
        $result .= '<h3>Description '.$xml[0]->ItemAttributes->Title.'</h3><br/>' . "\n"; 
		$asinan=$xml[0]->ASIN;
		echo $asinan;
		$description = $xml[0]->EditorialReviews->EditorialReview->Content[0];
		if (strlen($description) > 1000)
		{
			$limitsdesc = substr($description, 0, 1000);
		}
		else
		{
			$limitsdesc = $description;
		}

		$result .= $limitsdesc;
		return $result;
	}
}



?>
<?php echo AGCZoneContent(); ?>
<?php echo $asinan;?>