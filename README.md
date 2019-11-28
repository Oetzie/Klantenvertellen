# MODX Klantenvertellen
![Klantenvertellen version](https://img.shields.io/badge/version-1.3.0-blue.svg) ![MODX Extra by Oetzie.nl](https://img.shields.io/badge/checked%20by-oetzie-blue.svg) ![MODX version requirements](https://img.shields.io/badge/modx%20version%20requirement-2.4%2B-brightgreen.svg)

Klantenvertellen is a snippet to fetch all reviews of [Klantenvertellen](https://www.klantenvertellen.nl) and saves them into MODx.

## Snippet parameters

| Parameter                  | Description                                                                  |
|----------------------------|------------------------------------------------------------------------------|
| limit | The total of reviews to show. Default is `10`. |
| where | The where statement to fetch the reviews. This must be a valid JSON, default is `{"active": "1"}`. |
| sortby | The sortby statement to fetch the reviews. This must be a valid JSON, default is `{"created": "DESC"}`. |
| tpl | The template of a review. This can be a chunk name or prefixed with `@FILE` or `@INLINE`. |
| tplWrapper | The template of the wrapper to wrap all reviews. This can be a chunk name or prefixed with `@FILE` or `@INLINE`. |
| tplEmpty | The template if there are no reviews. This can be a chunk name or prefixed with `@FILE` or `@INLINE`. |
| usePdoTools | If `true` pdoTool will be used for the tpl's (Fenom is also available). `@FILE` and `@INLINE` are also available without PdoTools. Default is `false`. |
| usePdoElementsPath | If `true` pdoTools will use the `pdotools_elements_path` setting to locate the `@FILE` tpl's, otherwise the `core/components/klantenvertellen/` will be used as directory. Default is `false`. |
