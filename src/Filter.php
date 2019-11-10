<?php


namespace FilterCreator;


use FilterCreator\Contracts\IFilter;
use FilterCreator\Exceptions\FilterCreatorNotContractException;

class Filter
{

    /**
     * @var string
     */
    private $attachment;

    /**
     * @var string
     */
    private $buttonName;

    /**
     * @var \ArrayObject
     */
    private $filters;

    public function __construct()
    {
        $this->buttonName = 'Filter';
        $this->filters = new \ArrayObject();
    }

    /**
     * Serve para anexar a rota ou script que deve ser chamado
     * @param String $attachment
     */
    public function attach(String $attachment) : void
    {
        $this->attachment = $attachment;
    }

    /**
     * Atribui um nome personalizado para o botão filtrar
     * @param String $buttonName
     */
    public function setButtonName(String $buttonName) : void
    {
        $this->buttonName = $buttonName;
    }

    /**
     * Adiciona um filtro ao builder
     * @param BaseFilter $filter
     * @throws FilterCreatorNotContractException
     */
    public function add(BaseFilter $filter) : void
    {
        if ($filter instanceof IFilter) {
            $this->filters->append($filter);
            return;
        }

        throw new FilterCreatorNotContractException();
    }

    /**
     * Monta os filtros
     * @return String
     */
    public function mount() : String
    {
        $aux = '';
        $iterator = $this->filters->getIterator();
        while ($iterator->valid()) {
            $filter = $iterator->current();
            $aux .= $filter->mount();

            $iterator->next();
        }

        return $aux;
    }
}