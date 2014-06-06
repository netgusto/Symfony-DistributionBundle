Symfony-DistributionBundle
==========================

## Forwarding assets packages to web dir

```yaml
# app/config.yaml
netgusto_distribution:
    assets_forwarding:
        dest_dir: ~
        packages:
            - some/package
            - some/otherpackage
```
