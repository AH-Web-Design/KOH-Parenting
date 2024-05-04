<?php
require_once __DIR__ . '/vendor/autoload.php';



function connectHubspot()
{
    return \HubSpot\Factory::createWithAccessToken('pat-na1-a3d73cc8-6f4f-4537-b184-8425b6f0fb07');
}
function searchContact($email, $details = false)
{
    $hubspot = connectHubspot();
    $filter = new \HubSpot\Client\Crm\Contacts\Model\Filter();
    $filter->setOperator('EQ')->setPropertyName('email')->setValue($email);
    $filterGroup = new \HubSpot\Client\Crm\Contacts\Model\FilterGroup();
    $filterGroup->setFilters([$filter]);
    $searchRequest = new \HubSpot\Client\Crm\Contacts\Model\PublicObjectSearchRequest();
    $searchRequest->setFilterGroups([$filterGroup]);
    $searchRequest->setProperties(['email']);
    $result = $hubspot->crm()->contacts()->searchApi()->doSearch($searchRequest)['results'];

    if (!$details) {
        $listedEmail = false;
        for ($i = 0; $i < count($result); $i++) {
            $listedEmail = $result[$i]['properties']['email'];
        }
        return $listedEmail === $email ? true : false;
    } else {
        return $result;
    }
}

function insertContact($email, $name, $type)
{
    $nameArr = explode(',', $name);
    $firstName = '';
    $lastName = '';
    if(count($nameArr) > 2) {
        $firstName = $nameArr[0];
        $lastName = implode(', ', array_slice($nameArr, 1));
    } else if(count($nameArr) > 1) {
        $firstName = $nameArr[0];
        $lastName = $nameArr[1];
    } else {
        $firstName = $nameArr[0];
    }

    $hubspot = connectHubspot();
    $contactInput = new \HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput();
    $contactInput->setProperties([
        'email' => $email,
        'firstname' => $firstName,
        'lastname' => $lastName
    ]);

    $contact = $hubspot->crm()->contacts()->basicApi()->create($contactInput);
    if($type == 'subscriber') {
        addContactToList('6', $contact['id']);
    } else if($type == 'contact') {
        addContactToList('7', $contact['id']);
    }
    return $contact;
}

//Currently:
//Subscribers List ID: 5
//Contact Us List ID: 6
function addContactToList($listId, $contactId)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.hubapi.com/crm/v3/lists/".$listId."/memberships/add",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "PUT",
        CURLOPT_POSTFIELDS => "[".$contactId."]",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "authorization: Bearer pat-na1-a3d73cc8-6f4f-4537-b184-8425b6f0fb07",
            "content-type: application/json"
        ),
    )
    );

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    /*if ($err) {
        echo "cURL Error #:" . $err;
        //return false;
    } else {
        echo $response;
        //return true;
    }*/
}

?>