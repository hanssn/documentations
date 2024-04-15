<?php

namespace App\Markdown;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Node\Block\AbstractBlock;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use Torchlight\Block;

class TorchlightExtension extends BaseExtension implements ExtensionInterface, NodeRendererInterface
{
    /**
     * This method just proxies to our base class, but the
     * signature has to match Commonmark V2.
     *
     * @param  EnvironmentBuilderInterface  $environment
     */
    public function register(EnvironmentBuilderInterface $environment): void
    {

        $this->useCustomBlockRenderer(function (Block $block, AbstractBlock $node) {

            $attributes = $node->data['attributes'] ?? [];

            $inner = '';

            // Clones come from multiple themes.
            $blocks = $block->clones();
            array_unshift($blocks, $block);

            foreach ($blocks as $block) {
                $inner .= "<code {$block->attrsAsString()}class='{$block->classes}' style='{$block->styles}'>{$block->highlighted}</code>";
            }

            if ($node->data['title'] ?? null) {
                $attributes['title'] = $node->data['title'];
            }

            // Create the <pre> element wrapping the <code> element
            $preElement = new HtmlElement('pre', [], new HtmlElement('code', [], $inner));

            // Create the <figcaption> element for the title
            $titleElement = null;
            if ($attributes['title'] ?? null) {
                $titleElement = new HtmlElement('figcaption', $node->data->getData('attributes')->export(), $attributes['title']);
            }
            // Create the <figure> element with appropriate children
            $figureElementChildren = [$preElement];

            if ($titleElement !== null) {
                array_unshift($figureElementChildren, $titleElement);
            }
            return new HtmlElement('figure', [], $figureElementChildren);
        });

        $this->bind($environment, 'addRenderer');
    }

    /**
     * This method just proxies to our base class, but the
     * signature has to match Commonmark V2.
     *
     * @param  Node  $node
     * @param  ChildNodeRendererInterface  $childRenderer
     * @return mixed|string|\Stringable|null
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        return $this->renderNode($node);
    }


    /**
     * V2 Code node classes.
     *
     * @return string[]
     */
    protected function codeNodes()
    {
        return [
            FencedCode::class,
            IndentedCode::class,
        ];
    }

    /**
     * Get the string content from a V2 node.
     *
     * @param $node
     * @return string
     */
    protected function getLiteralContent($node)
    {
        return $node->getLiteral();
    }
}
