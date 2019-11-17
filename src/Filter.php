<?php


namespace FilterCreator;


use FilterCreator\Contracts\IFilter;
use FilterCreator\Exceptions\FilterCreatorInvalidAttachmentException;
use FilterCreator\Exceptions\FilterCreatorNotContractException;

class Filter
{
    /**
     * @var string
     */
    protected $attachment;

    /**
     * @var string
     */
    protected $attachmentType;

    /**
     * @var string
     */
    protected $buttonName;

    /**
     * @var \ArrayObject
     */
    protected $filters;

    /**
     * @var \ArrayObject
     */
    protected $buttons;

    public function __construct()
    {
        $this->buttonName = 'Filter';
        $this->filters = new \ArrayObject();
    }

    /**
     * Serve para anexar a rota ou script que deve ser chamado
     * @param String $attachment
     * @throws FilterCreatorInvalidAttachmentException
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
     * Adiciona um botão de ação ao builder
     * @param BaseButton $button
     */
    public function addButton(BaseButton $button) : void
    {
        $this->buttons->append($button);
    }

    /**
     * Monta os filtros
     * @return String
     */
    public function mount() : String
    {
        $aux = '<div>';
        $iterator = $this->filters->getIterator();
        while ($iterator->valid()) {
            $filter = $iterator->current();
            $aux .= $filter->mount();

            $iterator->next();
        }

        $aux .= '<div>';
        $aux .= $this->createButton();
        $itButtons = $this->buttons->getIterator();
        while ($itButtons->valid()) {
            $aux .= $itButtons->current()->mount();

            $itButtons->next();
        }
        $aux .= '</div>';
        $aux .= '</div>';

        return $aux;
    }

    protected function createButton()
    {
        $onClick = "onclick='{$this->attachment}'";
        $button = "<input type='button' {$onClick} value='{$this->buttonName}'>";

        return $button;
    }
}