<?php

namespace Passionweb\CountryApi\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Country\CountryFilter;
use TYPO3\CMS\Core\Country\CountryProvider;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class CountryController extends ActionController
{
    public function __construct(
        private readonly CountryProvider $countryProvider
    ) {
    }

    public function listAction(): ResponseInterface {

        $availableCountries = $this->countryProvider->getAll();

        $germany = $this->countryProvider->getByIsoCode('DE');

        $filter = new CountryFilter();
        $filter->setOnlyCountries(['DE', 'AT', 'CH']);
        $selectedCountries = $this->countryProvider->getFiltered($filter);

        $this->view->assign('availableCountries', $availableCountries);
        $this->view->assign('germanCountry', $germany);
        $this->view->assign('selectedCountries', $selectedCountries);

        return $this->htmlResponse();
    }
}
