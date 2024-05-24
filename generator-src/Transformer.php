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
		$map = [
			"createDocumentindexesDocument" => "createDocuments",
			"createDocumentindexesNotification" => "createNotification",
			"documentindexesRead" => "documentRead",
			"documentindexesUpdateDocumentIndex" => "updateDocumentIndex",
			"documentindexesWithdraw" => "withdraw",
			"getDocumentindexesCategories" => "getCategories",
			"getDocumentindexesOutboundIPs" => "getOutboundIPs",
			"getDocumentindexesPaperPreference" => "getPaperPreference",
			"getDocumentindexesPaperPreferenceList" => "getPaperPreferenceList",
			"getDocumentindexesTypes" => "getTypes",
		];
		return $map[$endpointName] ?? $endpointName;
	}
}
