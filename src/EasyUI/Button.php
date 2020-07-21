<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 */

declare(strict_types=1);


namespace EasyUI;


use Closure;
use JsonSerializable;

class Button implements JsonSerializable {
    use Submittable;

    /** @var string */
    private $text;

    /** @var ButtonIcon|null */
    private $icon;

    public function __construct(string $text, ?ButtonIcon $icon = null, ?Closure $listener = null) {
        $this->text = $text;
        $this->icon = $icon;
        $this->setSubmitListener($listener);
    }

    public function hasIcon(): bool {
        return $this->icon !== null;
    }

    public function getIcon(): ?ButtonIcon {
        return $this->icon;
    }

    public function setIcon(?ButtonIcon $icon): void {
        $this->icon = $icon;
    }

    public function jsonSerialize(): array {
        $data = [
            "text" => $this->text
        ];

        if($this->hasIcon()) {
            $data["icon"] = $this->icon->jsonSerialize();
        }

        return $data;
    }

}