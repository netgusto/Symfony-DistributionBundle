Symfony-DistributionBundle
==========================

## Forwarding assets packages to web dir

In app/config.yaml
```yaml
netgusto_distribution:
    assets_forwarding:
        dest_dir: ~
        packages:
            - some/package
            - some/otherpackage
```

In composer.json
```json
{
    '...',
    "scripts": {
        "post-install-cmd": [
            '...',
            "Netgusto\\DistributionBundle\\Composer\\ScriptHandler::forwardAssetsToWebDir"
        ],
        "post-update-cmd": [
            '...',
            "Netgusto\\DistributionBundle\\Composer\\ScriptHandler::forwardAssetsToWebDir"
        ]
    },
    '...',
}
```

Packages will be forwarded to `web/vendor` at `composer install`, and at every `composer update`.
