<?php declare(strict_types=1);

namespace SkjalatilkynningApiClient\Generator;

use Stefna\OpenApiGenerator\DefaultTransformer;

final class Transformer extends DefaultTransformer
{
	public function __construct()
	{
		parent::__construct('SkjalatilkynningApiClient\\');
	}

	public function endpointName(string $endpointName, array $info): string
	{
		var_dump($endpointName);
		$map = [
			"createDocumentindexesDocument" => "CreateDocument",
			"createDocumentindexesNotification" => "CreateNotification",
			"documentindexesRead" => "DocumentRead",
			"documentindexesUpdateDocumentIndex" => "UpdateDocumentIndex",
			"documentindexesWithdraw" => "Withdraw",
			"getDocumentindexesCategories" => "GetCategories",
			"getDocumentindexesOutboundIPs" => "GetOutboundIPs",
			"getDocumentindexesPaperPreference" => "GetPaperPreference",
			"getDocumentindexesPaperPreferenceList" => "GetPaperPreferenceList",
			"getDocumentindexesTypes" => "GetTypes",
		];
		return $map[$endpointName] ?? $endpointName;
	}
}
