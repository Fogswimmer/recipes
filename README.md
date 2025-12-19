# Recipes for Fogswimmer bundles

## Data Migration Bundle

```bash

composer require fogswimmer/data-migration
```

To use the recipe add the following to your **composer.json**

```json
"extra": {
  "symfony": {
    "endpoint": [
      "https://raw.githubusercontent.com/fogswimmer/recipes/main/index.json",
      "flex://defaults"
    ]
  }
}
```
