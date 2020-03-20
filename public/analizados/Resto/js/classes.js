var classes = [
    {
        "name": "Absolute_Positioner",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 15,
        "ccn": 14,
        "ccnMethodMax": 14,
        "externals": [
            "Positioner",
            "Frame_Decorator",
            "parent"
        ],
        "parents": [
            "Positioner"
        ],
        "lcom": 2,
        "length": 159,
        "vocabulary": 24,
        "volume": 729.01,
        "difficulty": 17,
        "effort": 12393.15,
        "level": 0.06,
        "bugs": 0.24,
        "time": 689,
        "intelligentContent": 42.88,
        "number_operators": 57,
        "number_operands": 102,
        "number_operators_unique": 6,
        "number_operands_unique": 18,
        "cloc": 37,
        "loc": 105,
        "lloc": 68,
        "mi": 77.87,
        "mIwoC": 38.1,
        "commentWeight": 39.77,
        "kanDefect": 0.92,
        "relativeStructuralComplexity": 144,
        "relativeDataComplexity": 0.04,
        "relativeSystemComplexity": 144.04,
        "totalStructuralComplexity": 288,
        "totalDataComplexity": 0.08,
        "totalSystemComplexity": 288.08,
        "package": "\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Abstract_Renderer",
        "interface": false,
        "abstract": true,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "render",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_background_image",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_get_dash_pattern",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_border_none",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_border_hidden",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_border_dotted",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_border_dashed",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_border_solid",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_border_double",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_border_groove",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_border_ridge",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_tint",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_shade",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_border_inset",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_border_outset",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_opacity",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_debug_layout",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 18,
        "nbMethods": 18,
        "nbMethodsPrivate": 16,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 137,
        "ccn": 120,
        "ccnMethodMax": 67,
        "externals": [
            "DOMPDF",
            "Frame",
            "Image_Cache",
            "Image_Cache",
            "CSS_Color"
        ],
        "parents": [],
        "lcom": 6,
        "length": 1925,
        "vocabulary": 132,
        "volume": 13560.46,
        "difficulty": 140,
        "effort": 1898526.42,
        "level": 0.01,
        "bugs": 4.52,
        "time": 105474,
        "intelligentContent": 96.86,
        "number_operators": 598,
        "number_operands": 1327,
        "number_operators_unique": 23,
        "number_operands_unique": 109,
        "cloc": 144,
        "loc": 687,
        "lloc": 543,
        "mi": 32.56,
        "mIwoC": 0,
        "commentWeight": 32.56,
        "kanDefect": 5.85,
        "relativeStructuralComplexity": 576,
        "relativeDataComplexity": 1.07,
        "relativeSystemComplexity": 577.07,
        "totalStructuralComplexity": 10368,
        "totalDataComplexity": 19.28,
        "totalSystemComplexity": 10387.28,
        "package": "dompdf\\",
        "pageRank": 0.01,
        "afferentCoupling": 5,
        "efferentCoupling": 4,
        "instability": 0.44,
        "violations": {}
    },
    {
        "name": "Attribute_Translator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "translate_attributes",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_resolve_target",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "append_style",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_cell_list",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_get_valid_color",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_color",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_background_color",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_table_cellpadding",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_table_border",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_table_cellspacing",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_table_rules",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_hr_size",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_hr_align",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_table_row_align",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_table_row_valign",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_table_row_bgcolor",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_body_link",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_basefont_size",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_font_size",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 19,
        "nbMethods": 19,
        "nbMethodsPrivate": 17,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 55,
        "ccn": 37,
        "ccnMethodMax": 8,
        "externals": [
            "Frame",
            "self",
            "self",
            "self",
            "DOMNode",
            "DOMXpath",
            "self",
            "self",
            "self",
            "self",
            "self",
            "self",
            "self",
            "self",
            "self",
            "self",
            "self",
            "self",
            "self",
            "self",
            "self"
        ],
        "parents": [],
        "lcom": 19,
        "length": 685,
        "vocabulary": 220,
        "volume": 5330.23,
        "difficulty": 17.74,
        "effort": 94566.55,
        "level": 0.06,
        "bugs": 1.78,
        "time": 5254,
        "intelligentContent": 300.44,
        "number_operators": 120,
        "number_operands": 565,
        "number_operators_unique": 13,
        "number_operands_unique": 207,
        "cloc": 39,
        "loc": 331,
        "lloc": 292,
        "mi": 40.5,
        "mIwoC": 15.15,
        "commentWeight": 25.35,
        "kanDefect": 3.49,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 3.41,
        "relativeSystemComplexity": 39.41,
        "totalStructuralComplexity": 684,
        "totalDataComplexity": 64.86,
        "totalSystemComplexity": 748.86,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 4,
        "instability": 0.8,
        "violations": {}
    },
    {
        "name": "Block_Frame_Decorator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reset",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_current_line_box",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_current_line_number",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_line_boxes",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_current_line",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "clear_line",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_line",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_frame_to_line",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "remove_frames_from_line",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "increase_line_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "maximize_line_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_line",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 13,
        "nbMethods": 11,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 11,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 0,
        "wmc": 38,
        "ccn": 26,
        "ccnMethodMax": 10,
        "externals": [
            "Frame_Decorator",
            "Frame",
            "DOMPDF",
            "parent",
            "Line_Box",
            "parent",
            "Line_Box",
            "Frame",
            "Frame",
            "Frame",
            "Line_Box"
        ],
        "parents": [
            "Frame_Decorator"
        ],
        "lcom": 1,
        "length": 273,
        "vocabulary": 36,
        "volume": 1411.39,
        "difficulty": 62.36,
        "effort": 88019.38,
        "level": 0.02,
        "bugs": 0.47,
        "time": 4890,
        "intelligentContent": 22.63,
        "number_operators": 77,
        "number_operands": 196,
        "number_operators_unique": 14,
        "number_operands_unique": 22,
        "cloc": 86,
        "loc": 234,
        "lloc": 148,
        "mi": 67.46,
        "mIwoC": 27.11,
        "commentWeight": 40.35,
        "kanDefect": 2.33,
        "relativeStructuralComplexity": 484,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 484.38,
        "totalStructuralComplexity": 6292,
        "totalDataComplexity": 4.91,
        "totalSystemComplexity": 6296.91,
        "package": "dompdf\\",
        "pageRank": 0.02,
        "afferentCoupling": 3,
        "efferentCoupling": 5,
        "instability": 0.63,
        "violations": {}
    },
    {
        "name": "Block_Frame_Reflower",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_calculate_width",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_calculate_restricted_width",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_calculate_content_height",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_calculate_restricted_height",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_text_align",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "vertical_align",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "process_clear",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "process_float",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reflow",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 10,
        "nbMethods": 10,
        "nbMethodsPrivate": 5,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 171,
        "ccn": 162,
        "ccnMethodMax": 54,
        "externals": [
            "Frame_Reflower",
            "Block_Frame_Decorator",
            "parent",
            "DOMPDF_Exception",
            "Font_Metrics",
            "Frame",
            "Frame",
            "Frame_Decorator"
        ],
        "parents": [
            "Frame_Reflower"
        ],
        "lcom": 2,
        "length": 1410,
        "vocabulary": 111,
        "volume": 9580.13,
        "difficulty": 78.82,
        "effort": 755115.64,
        "level": 0.01,
        "bugs": 3.19,
        "time": 41951,
        "intelligentContent": 121.54,
        "number_operators": 474,
        "number_operands": 936,
        "number_operators_unique": 16,
        "number_operands_unique": 95,
        "cloc": 108,
        "loc": 666,
        "lloc": 558,
        "mi": 29.21,
        "mIwoC": 0,
        "commentWeight": 29.21,
        "kanDefect": 11.03,
        "relativeStructuralComplexity": 2601,
        "relativeDataComplexity": 0.17,
        "relativeSystemComplexity": 2601.17,
        "totalStructuralComplexity": 26010,
        "totalDataComplexity": 1.67,
        "totalSystemComplexity": 26011.67,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 7,
        "instability": 0.88,
        "violations": {}
    },
    {
        "name": "Block_Positioner",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 7,
        "ccn": 6,
        "ccnMethodMax": 6,
        "externals": [
            "Positioner",
            "Frame_Decorator",
            "parent"
        ],
        "parents": [
            "Positioner"
        ],
        "lcom": 2,
        "length": 63,
        "vocabulary": 19,
        "volume": 267.62,
        "difficulty": 7.86,
        "effort": 2102.72,
        "level": 0.13,
        "bugs": 0.09,
        "time": 117,
        "intelligentContent": 34.06,
        "number_operators": 19,
        "number_operands": 44,
        "number_operators_unique": 5,
        "number_operands_unique": 14,
        "cloc": 17,
        "loc": 49,
        "lloc": 32,
        "mi": 88.91,
        "mIwoC": 49.36,
        "commentWeight": 39.55,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 64,
        "relativeDataComplexity": 0.06,
        "relativeSystemComplexity": 64.06,
        "totalStructuralComplexity": 128,
        "totalDataComplexity": 0.11,
        "totalSystemComplexity": 128.11,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Block_Renderer",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "render",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_render_border",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_render_outline",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 38,
        "ccn": 36,
        "ccnMethodMax": 16,
        "externals": [
            "Abstract_Renderer",
            "Frame",
            "Frame_Decorator",
            "Frame_Decorator"
        ],
        "parents": [
            "Abstract_Renderer"
        ],
        "lcom": 1,
        "length": 424,
        "vocabulary": 60,
        "volume": 2504.52,
        "difficulty": 63.85,
        "effort": 159910.79,
        "level": 0.02,
        "bugs": 0.83,
        "time": 8884,
        "intelligentContent": 39.23,
        "number_operators": 101,
        "number_operands": 323,
        "number_operators_unique": 17,
        "number_operands_unique": 43,
        "cloc": 17,
        "loc": 142,
        "lloc": 125,
        "mi": 51.15,
        "mIwoC": 25.62,
        "commentWeight": 25.54,
        "kanDefect": 2.05,
        "relativeStructuralComplexity": 361,
        "relativeDataComplexity": 0.28,
        "relativeSystemComplexity": 361.28,
        "totalStructuralComplexity": 1083,
        "totalDataComplexity": 0.85,
        "totalSystemComplexity": 1083.85,
        "package": "dompdf\\",
        "pageRank": 0.01,
        "afferentCoupling": 4,
        "efferentCoupling": 3,
        "instability": 0.43,
        "violations": {}
    },
    {
        "name": "Canvas_Factory",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_instance",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 9,
        "ccn": 8,
        "ccnMethodMax": 8,
        "externals": [
            "class"
        ],
        "parents": [],
        "lcom": 2,
        "length": 45,
        "vocabulary": 21,
        "volume": 197.65,
        "difficulty": 6.75,
        "effort": 1334.17,
        "level": 0.15,
        "bugs": 0.07,
        "time": 74,
        "intelligentContent": 29.28,
        "number_operators": 18,
        "number_operands": 27,
        "number_operators_unique": 7,
        "number_operands_unique": 14,
        "cloc": 25,
        "loc": 54,
        "lloc": 29,
        "mi": 94.42,
        "mIwoC": 50.95,
        "commentWeight": 43.47,
        "kanDefect": 0.43,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 2.5,
        "relativeSystemComplexity": 2.5,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 5,
        "totalSystemComplexity": 5,
        "package": "dompdf\\",
        "pageRank": 0.01,
        "afferentCoupling": 2,
        "efferentCoupling": 1,
        "instability": 0.33,
        "violations": {}
    },
    {
        "name": "Cellmap",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__destruct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reset",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "lock_columns",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "is_columns_locked",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_num_rows",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_num_cols",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_columns",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_columns",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_column",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_rows",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_row",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_properties",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_spanned_cells",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "frame_exists_in_cellmap",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_frame_position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_frame_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_frame_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_column_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_row_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_resolve_border",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_frame",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_row",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "remove_row",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "remove_row_group",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "update_row_group",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "assign_x_positions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "assign_frame_heights",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_frame_heights",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__toString",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 31,
        "nbMethods": 25,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 24,
        "nbMethodsGetter": 5,
        "nbMethodsSetters": 1,
        "wmc": 105,
        "ccn": 75,
        "ccnMethodMax": 31,
        "externals": [
            "Table_Frame_Decorator",
            "DOMPDF_Exception",
            "DOMPDF_Exception",
            "DOMPDF_Exception",
            "DOMPDF_Exception",
            "Exception",
            "Frame",
            "Frame",
            "Frame",
            "Frame",
            "Frame"
        ],
        "parents": [],
        "lcom": 2,
        "length": 1157,
        "vocabulary": 146,
        "volume": 8318.63,
        "difficulty": 70.98,
        "effort": 590456.15,
        "level": 0.01,
        "bugs": 2.77,
        "time": 32803,
        "intelligentContent": 117.2,
        "number_operators": 312,
        "number_operands": 845,
        "number_operators_unique": 21,
        "number_operands_unique": 125,
        "cloc": 133,
        "loc": 586,
        "lloc": 453,
        "mi": 38.17,
        "mIwoC": 4.52,
        "commentWeight": 33.64,
        "kanDefect": 6.24,
        "relativeStructuralComplexity": 400,
        "relativeDataComplexity": 1.19,
        "relativeSystemComplexity": 401.19,
        "totalStructuralComplexity": 12400,
        "totalDataComplexity": 36.86,
        "totalSystemComplexity": 12436.86,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 4,
        "instability": 0.8,
        "violations": {}
    },
    {
        "name": "CPDF_Adapter",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__destruct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_cpdf",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_info",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "open_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reopen_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "close_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "stop_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "serialize_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reopen_serialized_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_width",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_height",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_page_number",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_page_count",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_page_number",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_page_count",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_stroke_color",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_fill_color",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_line_transparency",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_fill_transparency",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_line_style",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_opacity",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_default_view",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "y",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "line",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_convert_gif_bmp_to_png",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "rectangle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "filled_rectangle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "clipping_rectangle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "clipping_end",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "save",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "restore",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "rotate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "skew",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "scale",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "translate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "transform",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "polygon",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "circle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "image",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "text",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "javascript",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_named_dest",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_link",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_text_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "register_string_subset",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_font_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_font_baseline",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "page_text",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "page_script",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new_page",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_add_page_text",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "stream",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "output",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_messages",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 56,
        "nbMethods": 49,
        "nbMethodsPrivate": 8,
        "nbMethodsPublic": 41,
        "nbMethodsGetter": 5,
        "nbMethodsSetters": 2,
        "wmc": 86,
        "ccn": 31,
        "ccnMethodMax": 10,
        "externals": [
            "Canvas",
            "Cpdf",
            "Image_Cache",
            "DOMPDF_Exception",
            "PHP_Evaluator"
        ],
        "parents": [],
        "lcom": 1,
        "length": 1004,
        "vocabulary": 264,
        "volume": 8076.57,
        "difficulty": 28.81,
        "effort": 232657.37,
        "level": 0.03,
        "bugs": 2.69,
        "time": 12925,
        "intelligentContent": 280.37,
        "number_operators": 111,
        "number_operands": 893,
        "number_operators_unique": 16,
        "number_operands_unique": 248,
        "cloc": 354,
        "loc": 739,
        "lloc": 385,
        "mi": 55.99,
        "mIwoC": 12.07,
        "commentWeight": 43.91,
        "kanDefect": 2.54,
        "relativeStructuralComplexity": 3136,
        "relativeDataComplexity": 0.36,
        "relativeSystemComplexity": 3136.36,
        "totalStructuralComplexity": 175616,
        "totalDataComplexity": 19.95,
        "totalSystemComplexity": 175635.95,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "CSS_Color",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "parse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getArray",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 23,
        "ccn": 22,
        "ccnMethodMax": 21,
        "externals": [
            "self",
            "self",
            "self",
            "self",
            "self"
        ],
        "parents": [],
        "lcom": 2,
        "length": 567,
        "vocabulary": 338,
        "volume": 4763.3,
        "difficulty": 11.88,
        "effort": 56567.87,
        "level": 0.08,
        "bugs": 1.59,
        "time": 3143,
        "intelligentContent": 401.09,
        "number_operators": 89,
        "number_operands": 478,
        "number_operators_unique": 16,
        "number_operands_unique": 322,
        "cloc": 17,
        "loc": 105,
        "lloc": 88,
        "mi": 58.06,
        "mIwoC": 28.87,
        "commentWeight": 29.19,
        "kanDefect": 1.66,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 6.5,
        "relativeSystemComplexity": 7.5,
        "totalStructuralComplexity": 2,
        "totalDataComplexity": 13,
        "totalSystemComplexity": 15,
        "package": "dompdf\\",
        "pageRank": 0.01,
        "afferentCoupling": 2,
        "efferentCoupling": 1,
        "instability": 0.33,
        "violations": {}
    },
    {
        "name": "DOMPDF",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__destruct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "save_locale",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "restore_locale",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_tree",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_protocol",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_host",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_base_path",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_http_context",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_default_view",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_protocol",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_host",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_base_path",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_http_context",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_canvas",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_callbacks",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_css",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "load_html_file",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "load_html",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "remove_text_nodes",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_process_html",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_paper",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "enable_caching",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_callbacks",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_quirksmode",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "parse_default_view",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "render",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_info",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "write_log",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "stream",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "output",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "output_html",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 32,
        "nbMethods": 18,
        "nbMethodsPrivate": 4,
        "nbMethodsPublic": 14,
        "nbMethodsGetter": 9,
        "nbMethodsSetters": 5,
        "wmc": 120,
        "ccn": 89,
        "ccnMethodMax": 24,
        "externals": [
            "Stylesheet",
            "DOMPDF_Exception",
            "DOMPDF_Exception",
            "DOMPDF_Exception",
            "DOMPDF_Exception",
            "HTML5_Tokenizer",
            "self",
            "DOMDocument",
            "Frame_Tree",
            "DOMNode",
            "Canvas_Factory",
            "Font_Metrics",
            "List_Bullet_Renderer",
            "Frame_Factory",
            "Frame_Factory",
            "Frame",
            "DOMXPath",
            "Frame_Factory",
            "Renderer",
            "Image_Cache"
        ],
        "parents": [],
        "lcom": 3,
        "length": 846,
        "vocabulary": 199,
        "volume": 6460.58,
        "difficulty": 30.28,
        "effort": 195637.92,
        "level": 0.03,
        "bugs": 2.15,
        "time": 10869,
        "intelligentContent": 213.35,
        "number_operators": 237,
        "number_operands": 609,
        "number_operators_unique": 18,
        "number_operands_unique": 181,
        "cloc": 351,
        "loc": 836,
        "lloc": 485,
        "mi": 44.94,
        "mIwoC": 2.76,
        "commentWeight": 42.18,
        "kanDefect": 7.38,
        "relativeStructuralComplexity": 3481,
        "relativeDataComplexity": 0.29,
        "relativeSystemComplexity": 3481.29,
        "totalStructuralComplexity": 111392,
        "totalDataComplexity": 9.4,
        "totalSystemComplexity": 111401.4,
        "package": "dompdf\\",
        "pageRank": 0.02,
        "afferentCoupling": 17,
        "efferentCoupling": 15,
        "instability": 0.47,
        "violations": {}
    },
    {
        "name": "DOMPDF_Exception",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Exception",
            "parent"
        ],
        "parents": [
            "Exception"
        ],
        "lcom": 1,
        "length": 5,
        "vocabulary": 3,
        "volume": 7.92,
        "difficulty": 0,
        "effort": 0,
        "level": 1.2,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 9.51,
        "number_operators": 0,
        "number_operands": 5,
        "number_operators_unique": 0,
        "number_operands_unique": 3,
        "cloc": 18,
        "loc": 26,
        "lloc": 8,
        "mi": 121.9,
        "mIwoC": 73.87,
        "commentWeight": 48.03,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1,
        "relativeSystemComplexity": 2,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 2,
        "package": "dompdf\\",
        "pageRank": 0.09,
        "afferentCoupling": 15,
        "efferentCoupling": 2,
        "instability": 0.12,
        "violations": {}
    },
    {
        "name": "DOMPDF_Image_Exception",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "DOMPDF_Exception",
            "parent"
        ],
        "parents": [
            "DOMPDF_Exception"
        ],
        "lcom": 1,
        "length": 5,
        "vocabulary": 3,
        "volume": 7.92,
        "difficulty": 0,
        "effort": 0,
        "level": 1.2,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 9.51,
        "number_operators": 0,
        "number_operands": 5,
        "number_operators_unique": 0,
        "number_operands_unique": 3,
        "cloc": 18,
        "loc": 26,
        "lloc": 8,
        "mi": 121.9,
        "mIwoC": 73.87,
        "commentWeight": 48.03,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1,
        "relativeSystemComplexity": 2,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 2,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Fixed_Positioner",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 14,
        "ccn": 13,
        "ccnMethodMax": 13,
        "externals": [
            "Positioner",
            "Frame_Decorator",
            "parent"
        ],
        "parents": [
            "Positioner"
        ],
        "lcom": 2,
        "length": 182,
        "vocabulary": 34,
        "volume": 925.92,
        "difficulty": 19.69,
        "effort": 18233.47,
        "level": 0.05,
        "bugs": 0.31,
        "time": 1013,
        "intelligentContent": 47.02,
        "number_operators": 54,
        "number_operands": 128,
        "number_operators_unique": 8,
        "number_operands_unique": 26,
        "cloc": 13,
        "loc": 80,
        "lloc": 67,
        "mi": 66.88,
        "mIwoC": 37.65,
        "commentWeight": 29.23,
        "kanDefect": 1.01,
        "relativeStructuralComplexity": 144,
        "relativeDataComplexity": 0.04,
        "relativeSystemComplexity": 144.04,
        "totalStructuralComplexity": 288,
        "totalDataComplexity": 0.08,
        "totalSystemComplexity": 288.08,
        "package": "\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_Metrics",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "init",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_text_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_font_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_font",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_family",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "save_font_families",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "load_font_families",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_type",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "install_fonts",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_system_fonts",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_font_families",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_font_family",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "register_font",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 13,
        "nbMethods": 13,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 13,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 39,
        "ccn": 27,
        "ccnMethodMax": 10,
        "externals": [
            "Canvas",
            "Canvas_Factory",
            "Font",
            "self",
            "self",
            "Font_Metrics",
            "Font_Metrics",
            "Font_Metrics",
            "Font",
            "Font_Metrics"
        ],
        "parents": [],
        "lcom": 13,
        "length": 309,
        "vocabulary": 67,
        "volume": 1874.42,
        "difficulty": 16.45,
        "effort": 30831,
        "level": 0.06,
        "bugs": 0.62,
        "time": 1713,
        "intelligentContent": 113.96,
        "number_operators": 97,
        "number_operands": 212,
        "number_operators_unique": 9,
        "number_operands_unique": 58,
        "cloc": 93,
        "loc": 255,
        "lloc": 164,
        "mi": 65.38,
        "mIwoC": 25.14,
        "commentWeight": 40.25,
        "kanDefect": 2.31,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 2.13,
        "relativeSystemComplexity": 83.13,
        "totalStructuralComplexity": 1053,
        "totalDataComplexity": 27.7,
        "totalSystemComplexity": 1080.7,
        "package": "dompdf\\",
        "pageRank": 0.03,
        "afferentCoupling": 12,
        "efferentCoupling": 6,
        "instability": 0.33,
        "violations": {}
    },
    {
        "name": "Frame",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__destruct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "ws_trim",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "ws_keep",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "ws_is_text",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "dispose",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reset",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_node",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_id",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_style",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_original_style",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_parent",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_decorator",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_first_child",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_last_child",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_prev_sibling",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_next_sibling",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_children",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_containing_block",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_margin_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_margin_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_break_margins",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_padding_box",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_box",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_opacity",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_containing_line",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_id",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_style",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_decorator",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_containing_block",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_opacity",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_containing_line",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "is_text_node",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "is_positionned",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "is_absolute",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "is_block",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "is_in_flow",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "is_pre",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "is_table",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "prepend_child",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "append_child",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "insert_child_before",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "insert_child_after",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "remove_child",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__toString",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 47,
        "nbMethods": 36,
        "nbMethodsPrivate": 3,
        "nbMethodsPublic": 33,
        "nbMethodsGetter": 11,
        "nbMethodsSetters": 0,
        "wmc": 133,
        "ccn": 87,
        "ccnMethodMax": 14,
        "externals": [
            "DOMNode",
            "FrameList",
            "Style",
            "Frame_Decorator",
            "Line_Box",
            "Frame",
            "Frame",
            "Frame",
            "Frame",
            "DOMPDF_Exception",
            "Frame",
            "Frame",
            "DOMPDF_Exception",
            "Frame",
            "DOMPDF_Exception"
        ],
        "parents": [],
        "lcom": 2,
        "length": 1062,
        "vocabulary": 113,
        "volume": 7243.03,
        "difficulty": 59.05,
        "effort": 427712.13,
        "level": 0.02,
        "bugs": 2.41,
        "time": 23762,
        "intelligentContent": 122.66,
        "number_operators": 346,
        "number_operands": 716,
        "number_operators_unique": 16,
        "number_operands_unique": 97,
        "cloc": 258,
        "loc": 797,
        "lloc": 539,
        "mi": 40.27,
        "mIwoC": 1.68,
        "commentWeight": 38.58,
        "kanDefect": 6.21,
        "relativeStructuralComplexity": 729,
        "relativeDataComplexity": 1.77,
        "relativeSystemComplexity": 730.77,
        "totalStructuralComplexity": 34263,
        "totalDataComplexity": 83.25,
        "totalSystemComplexity": 34346.25,
        "package": "dompdf\\",
        "pageRank": 0.26,
        "afferentCoupling": 40,
        "efferentCoupling": 8,
        "instability": 0.17,
        "violations": {}
    },
    {
        "name": "FrameList",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getIterator",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "IteratorAggregate",
            "FrameListIterator"
        ],
        "parents": [],
        "lcom": 1,
        "length": 6,
        "vocabulary": 4,
        "volume": 12,
        "difficulty": 2,
        "effort": 24,
        "level": 0.5,
        "bugs": 0,
        "time": 1,
        "intelligentContent": 6,
        "number_operators": 2,
        "number_operands": 4,
        "number_operators_unique": 2,
        "number_operands_unique": 2,
        "cloc": 7,
        "loc": 20,
        "lloc": 13,
        "mi": 107.68,
        "mIwoC": 68.01,
        "commentWeight": 39.67,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 1.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 3,
        "package": "dompdf\\",
        "pageRank": 0.02,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "FrameListIterator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "rewind",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "valid",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "key",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "current",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "next",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 0,
        "wmc": 7,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Iterator",
            "Frame"
        ],
        "parents": [],
        "lcom": 1,
        "length": 34,
        "vocabulary": 7,
        "volume": 95.45,
        "difficulty": 7.88,
        "effort": 751.67,
        "level": 0.13,
        "bugs": 0.03,
        "time": 42,
        "intelligentContent": 12.12,
        "number_operators": 13,
        "number_operands": 21,
        "number_operators_unique": 3,
        "number_operands_unique": 4,
        "cloc": 28,
        "loc": 68,
        "lloc": 40,
        "mi": 92.83,
        "mIwoC": 50.92,
        "commentWeight": 41.91,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 1.72,
        "relativeSystemComplexity": 5.72,
        "totalStructuralComplexity": 24,
        "totalDataComplexity": 10.33,
        "totalSystemComplexity": 34.33,
        "package": "dompdf\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "FrameTreeList",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getIterator",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "IteratorAggregate",
            "Frame",
            "FrameTreeIterator"
        ],
        "parents": [],
        "lcom": 1,
        "length": 6,
        "vocabulary": 4,
        "volume": 12,
        "difficulty": 2,
        "effort": 24,
        "level": 0.5,
        "bugs": 0,
        "time": 1,
        "intelligentContent": 6,
        "number_operators": 2,
        "number_operands": 4,
        "number_operators_unique": 2,
        "number_operands_unique": 2,
        "cloc": 13,
        "loc": 26,
        "lloc": 13,
        "mi": 112.47,
        "mIwoC": 68.01,
        "commentWeight": 44.46,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 1.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 3,
        "package": "dompdf\\",
        "pageRank": 0.01,
        "afferentCoupling": 2,
        "efferentCoupling": 3,
        "instability": 0.6,
        "violations": {}
    },
    {
        "name": "FrameTreeIterator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "rewind",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "valid",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "key",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "current",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "next",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 8,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [
            "Iterator",
            "Frame"
        ],
        "parents": [],
        "lcom": 1,
        "length": 45,
        "vocabulary": 10,
        "volume": 149.49,
        "difficulty": 14,
        "effort": 2092.81,
        "level": 0.07,
        "bugs": 0.05,
        "time": 116,
        "intelligentContent": 10.68,
        "number_operators": 17,
        "number_operands": 28,
        "number_operators_unique": 5,
        "number_operands_unique": 5,
        "cloc": 28,
        "loc": 70,
        "lloc": 42,
        "mi": 90.48,
        "mIwoC": 48.96,
        "commentWeight": 41.52,
        "kanDefect": 0.45,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 1.39,
        "relativeSystemComplexity": 5.39,
        "totalStructuralComplexity": 24,
        "totalDataComplexity": 8.33,
        "totalSystemComplexity": 32.33,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "Frame_Decorator",
        "interface": false,
        "abstract": true,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "dispose",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "copy",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deep_copy",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reset",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_id",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_frame",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_node",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_style",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_original_style",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_containing_block",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_dompdf",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_margin_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_margin_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_padding_box",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_box",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_id",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_style",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_containing_block",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__toString",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "prepend_child",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "append_child",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "insert_child_before",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "insert_child_after",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "remove_child",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_parent",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_first_child",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_last_child",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_prev_sibling",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_next_sibling",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_subtree",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_positioner",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_reflower",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_reflower",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_root",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_root",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "find_block_parent",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "find_positionned_parent",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "split",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reset_counter",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "increment_counters",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "increment_counter",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "lookup_counter_frame",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "counter_value",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "move",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reflow",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_min_max_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 50,
        "nbMethods": 46,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 46,
        "nbMethodsGetter": 4,
        "nbMethodsSetters": 0,
        "wmc": 110,
        "ccn": 61,
        "ccnMethodMax": 12,
        "externals": [
            "Frame",
            "Frame",
            "DOMPDF",
            "DomNode",
            "Frame",
            "Frame_Factory",
            "Frame",
            "Frame_Factory",
            "Style",
            "Frame",
            "Frame",
            "Frame",
            "Frame",
            "Frame",
            "Frame",
            "Frame",
            "FrameTreeList",
            "Positioner",
            "Frame_Reflower",
            "Frame",
            "DOMPDF_Exception",
            "Frame_Decorator"
        ],
        "parents": [
            "Frame"
        ],
        "lcom": 2,
        "length": 571,
        "vocabulary": 72,
        "volume": 3523.03,
        "difficulty": 35.16,
        "effort": 123883.5,
        "level": 0.03,
        "bugs": 1.17,
        "time": 6882,
        "intelligentContent": 100.19,
        "number_operators": 181,
        "number_operands": 390,
        "number_operators_unique": 11,
        "number_operands_unique": 61,
        "cloc": 159,
        "loc": 584,
        "lloc": 425,
        "mi": 45.78,
        "mIwoC": 9.62,
        "commentWeight": 36.16,
        "kanDefect": 6.56,
        "relativeStructuralComplexity": 2116,
        "relativeDataComplexity": 1.02,
        "relativeSystemComplexity": 2117.02,
        "totalStructuralComplexity": 105800,
        "totalDataComplexity": 50.91,
        "totalSystemComplexity": 105850.91,
        "package": "dompdf\\",
        "pageRank": 0.06,
        "afferentCoupling": 36,
        "efferentCoupling": 11,
        "instability": 0.23,
        "violations": {}
    },
    {
        "name": "Frame_Factory",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "decorate_root",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "decorate_frame",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 26,
        "ccn": 25,
        "ccnMethodMax": 25,
        "externals": [
            "Frame",
            "DOMPDF",
            "Page_Frame_Decorator",
            "Page_Frame_Reflower",
            "Frame",
            "DOMPDF",
            "Exception",
            "decorator",
            "positioner",
            "reflower"
        ],
        "parents": [],
        "lcom": 2,
        "length": 245,
        "vocabulary": 55,
        "volume": 1416.43,
        "difficulty": 14.3,
        "effort": 20251.98,
        "level": 0.07,
        "bugs": 0.47,
        "time": 1125,
        "intelligentContent": 99.07,
        "number_operators": 77,
        "number_operands": 168,
        "number_operators_unique": 8,
        "number_operands_unique": 47,
        "cloc": 36,
        "loc": 164,
        "lloc": 128,
        "mi": 61.79,
        "mIwoC": 28.61,
        "commentWeight": 33.19,
        "kanDefect": 0.93,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 0.57,
        "relativeSystemComplexity": 36.57,
        "totalStructuralComplexity": 72,
        "totalDataComplexity": 1.14,
        "totalSystemComplexity": 73.14,
        "package": "dompdf\\",
        "pageRank": 0.02,
        "afferentCoupling": 4,
        "efferentCoupling": 8,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "Frame_Reflower",
        "interface": false,
        "abstract": true,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "dispose",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_collapse_margins",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reflow",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_min_max_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_parse_string",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_parse_quotes",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_parse_content",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_content",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 9,
        "nbMethods": 9,
        "nbMethodsPrivate": 5,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 72,
        "ccn": 64,
        "ccnMethodMax": 29,
        "externals": [
            "Frame",
            "Frame_Decorator",
            "Frame",
            "Frame_Factory"
        ],
        "parents": [],
        "lcom": 3,
        "length": 626,
        "vocabulary": 107,
        "volume": 4220.16,
        "difficulty": 34.81,
        "effort": 146902.79,
        "level": 0.03,
        "bugs": 1.41,
        "time": 8161,
        "intelligentContent": 121.23,
        "number_operators": 199,
        "number_operands": 427,
        "number_operators_unique": 15,
        "number_operands_unique": 92,
        "cloc": 87,
        "loc": 356,
        "lloc": 269,
        "mi": 47.66,
        "mIwoC": 13,
        "commentWeight": 34.66,
        "kanDefect": 4.24,
        "relativeStructuralComplexity": 1156,
        "relativeDataComplexity": 0.27,
        "relativeSystemComplexity": 1156.27,
        "totalStructuralComplexity": 10404,
        "totalDataComplexity": 2.43,
        "totalSystemComplexity": 10406.43,
        "package": "dompdf\\",
        "pageRank": 0.01,
        "afferentCoupling": 11,
        "efferentCoupling": 3,
        "instability": 0.21,
        "violations": {}
    },
    {
        "name": "Frame_Tree",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__destruct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_dom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_root",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_frame",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_frames",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "build_tree",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "fix_tables",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_build_tree_r",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "insert_node",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 10,
        "nbMethods": 8,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 6,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 0,
        "wmc": 28,
        "ccn": 19,
        "ccnMethodMax": 11,
        "externals": [
            "DomDocument",
            "FrameTreeList",
            "DOMPDF_Exception",
            "DOMXPath",
            "DomNode",
            "Frame",
            "DOMNode",
            "DOMNode"
        ],
        "parents": [],
        "lcom": 2,
        "length": 197,
        "vocabulary": 54,
        "volume": 1133.71,
        "difficulty": 16.36,
        "effort": 18551.66,
        "level": 0.06,
        "bugs": 0.38,
        "time": 1031,
        "intelligentContent": 69.28,
        "number_operators": 53,
        "number_operands": 144,
        "number_operators_unique": 10,
        "number_operands_unique": 44,
        "cloc": 97,
        "loc": 210,
        "lloc": 113,
        "mi": 74.71,
        "mIwoC": 31.27,
        "commentWeight": 43.44,
        "kanDefect": 1.47,
        "relativeStructuralComplexity": 225,
        "relativeDataComplexity": 0.48,
        "relativeSystemComplexity": 225.48,
        "totalStructuralComplexity": 2250,
        "totalDataComplexity": 4.75,
        "totalSystemComplexity": 2254.75,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 2,
        "efferentCoupling": 7,
        "instability": 0.78,
        "violations": {}
    },
    {
        "name": "GD_Adapter",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_image",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_page_number",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_page_count",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_page_number",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_page_count",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_opacity",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_allocate_color",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "line",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "rectangle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "filled_rectangle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "clipping_rectangle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "clipping_end",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "save",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "restore",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "rotate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "skew",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "scale",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "translate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "transform",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "polygon",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "circle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "image",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "text",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "javascript",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_named_dest",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_link",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_info",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_default_view",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_text_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_ttf_file",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_font_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_font_baseline",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new_page",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "open_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "close_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "page_text",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "stream",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "output",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 42,
        "nbMethods": 37,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 36,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 2,
        "wmc": 99,
        "ccn": 58,
        "ccnMethodMax": 13,
        "externals": [
            "Canvas",
            "Image_Cache",
            "Image_Cache"
        ],
        "parents": [],
        "lcom": 20,
        "length": 904,
        "vocabulary": 114,
        "volume": 6176.93,
        "difficulty": 68.5,
        "effort": 423119.88,
        "level": 0.01,
        "bugs": 2.06,
        "time": 23507,
        "intelligentContent": 90.17,
        "number_operators": 219,
        "number_operands": 685,
        "number_operators_unique": 19,
        "number_operands_unique": 95,
        "cloc": 327,
        "loc": 727,
        "lloc": 400,
        "mi": 51.99,
        "mIwoC": 8.89,
        "commentWeight": 43.09,
        "kanDefect": 3.7,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 3.29,
        "relativeSystemComplexity": 19.29,
        "totalStructuralComplexity": 672,
        "totalDataComplexity": 138,
        "totalSystemComplexity": 810,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Image_Frame_Decorator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_image_url",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_image_msg",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 0,
        "wmc": 6,
        "ccn": 4,
        "ccnMethodMax": 4,
        "externals": [
            "Frame_Decorator",
            "Frame",
            "DOMPDF",
            "parent",
            "Image_Cache",
            "Image_Cache",
            "Font_Metrics",
            "Font_Metrics"
        ],
        "parents": [
            "Frame_Decorator"
        ],
        "lcom": 1,
        "length": 51,
        "vocabulary": 20,
        "volume": 220.42,
        "difficulty": 9.69,
        "effort": 2136.36,
        "level": 0.1,
        "bugs": 0.07,
        "time": 119,
        "intelligentContent": 22.74,
        "number_operators": 15,
        "number_operands": 36,
        "number_operators_unique": 7,
        "number_operands_unique": 13,
        "cloc": 42,
        "loc": 71,
        "lloc": 29,
        "mi": 97.6,
        "mIwoC": 51.15,
        "commentWeight": 46.45,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 0.27,
        "relativeSystemComplexity": 81.27,
        "totalStructuralComplexity": 243,
        "totalDataComplexity": 0.8,
        "totalSystemComplexity": 243.8,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 2,
        "efferentCoupling": 6,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "Image_Frame_Reflower",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reflow",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_min_max_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 24,
        "ccn": 22,
        "ccnMethodMax": 21,
        "externals": [
            "Frame_Reflower",
            "Image_Frame_Decorator",
            "parent",
            "Frame_Decorator"
        ],
        "parents": [
            "Frame_Reflower"
        ],
        "lcom": 2,
        "length": 229,
        "vocabulary": 36,
        "volume": 1183.91,
        "difficulty": 35.75,
        "effort": 42324.88,
        "level": 0.03,
        "bugs": 0.39,
        "time": 2351,
        "intelligentContent": 33.12,
        "number_operators": 86,
        "number_operands": 143,
        "number_operators_unique": 12,
        "number_operands_unique": 24,
        "cloc": 43,
        "loc": 112,
        "lloc": 69,
        "mi": 76.37,
        "mIwoC": 35.41,
        "commentWeight": 40.96,
        "kanDefect": 0.78,
        "relativeStructuralComplexity": 64,
        "relativeDataComplexity": 0.19,
        "relativeSystemComplexity": 64.19,
        "totalStructuralComplexity": 192,
        "totalDataComplexity": 0.56,
        "totalSystemComplexity": 192.56,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Image_Renderer",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "render",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 12,
        "ccn": 12,
        "ccnMethodMax": 12,
        "externals": [
            "Block_Renderer",
            "Frame",
            "Image_Cache"
        ],
        "parents": [
            "Block_Renderer"
        ],
        "lcom": 1,
        "length": 160,
        "vocabulary": 37,
        "volume": 833.51,
        "difficulty": 17.1,
        "effort": 14255.94,
        "level": 0.06,
        "bugs": 0.28,
        "time": 792,
        "intelligentContent": 48.73,
        "number_operators": 36,
        "number_operands": 124,
        "number_operators_unique": 8,
        "number_operands_unique": 29,
        "cloc": 15,
        "loc": 62,
        "lloc": 47,
        "mi": 75.98,
        "mIwoC": 41.46,
        "commentWeight": 34.52,
        "kanDefect": 0.8,
        "relativeStructuralComplexity": 361,
        "relativeDataComplexity": 0.05,
        "relativeSystemComplexity": 361.05,
        "totalStructuralComplexity": 361,
        "totalDataComplexity": 0.05,
        "totalSystemComplexity": 361.05,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "Inline_Frame_Decorator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "split",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 13,
        "ccn": 12,
        "ccnMethodMax": 12,
        "externals": [
            "Frame_Decorator",
            "Frame",
            "DOMPDF",
            "parent",
            "DOMPDF_Exception"
        ],
        "parents": [
            "Frame_Decorator"
        ],
        "lcom": 2,
        "length": 103,
        "vocabulary": 25,
        "volume": 478.32,
        "difficulty": 13.61,
        "effort": 6510.43,
        "level": 0.07,
        "bugs": 0.16,
        "time": 362,
        "intelligentContent": 35.14,
        "number_operators": 33,
        "number_operands": 70,
        "number_operators_unique": 7,
        "number_operands_unique": 18,
        "cloc": 21,
        "loc": 64,
        "lloc": 43,
        "mi": 82.76,
        "mIwoC": 43.99,
        "commentWeight": 38.77,
        "kanDefect": 0.66,
        "relativeStructuralComplexity": 121,
        "relativeDataComplexity": 0.25,
        "relativeSystemComplexity": 121.25,
        "totalStructuralComplexity": 242,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 242.5,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Inline_Frame_Reflower",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reflow",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 9,
        "ccn": 8,
        "ccnMethodMax": 8,
        "externals": [
            "Frame_Reflower",
            "Frame",
            "parent",
            "Frame_Decorator"
        ],
        "parents": [
            "Frame_Reflower"
        ],
        "lcom": 2,
        "length": 68,
        "vocabulary": 15,
        "volume": 265.67,
        "difficulty": 8.55,
        "effort": 2270.26,
        "level": 0.12,
        "bugs": 0.09,
        "time": 126,
        "intelligentContent": 31.09,
        "number_operators": 21,
        "number_operands": 47,
        "number_operators_unique": 4,
        "number_operands_unique": 11,
        "cloc": 19,
        "loc": 59,
        "lloc": 40,
        "mi": 85.51,
        "mIwoC": 47,
        "commentWeight": 38.51,
        "kanDefect": 0.66,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.13,
        "relativeSystemComplexity": 196.13,
        "totalStructuralComplexity": 392,
        "totalDataComplexity": 0.27,
        "totalSystemComplexity": 392.27,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Inline_Positioner",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 9,
        "ccnMethodMax": 9,
        "externals": [
            "Positioner",
            "Frame_Decorator",
            "parent",
            "DOMPDF_Exception"
        ],
        "parents": [
            "Positioner"
        ],
        "lcom": 2,
        "length": 62,
        "vocabulary": 21,
        "volume": 272.32,
        "difficulty": 12,
        "effort": 3267.88,
        "level": 0.08,
        "bugs": 0.09,
        "time": 182,
        "intelligentContent": 22.69,
        "number_operators": 23,
        "number_operands": 39,
        "number_operators_unique": 8,
        "number_operands_unique": 13,
        "cloc": 25,
        "loc": 58,
        "lloc": 33,
        "mi": 91.14,
        "mIwoC": 48.61,
        "commentWeight": 42.53,
        "kanDefect": 0.66,
        "relativeStructuralComplexity": 121,
        "relativeDataComplexity": 0.04,
        "relativeSystemComplexity": 121.04,
        "totalStructuralComplexity": 242,
        "totalDataComplexity": 0.08,
        "totalSystemComplexity": 242.08,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Inline_Renderer",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "render",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 49,
        "ccn": 49,
        "ccnMethodMax": 49,
        "externals": [
            "Abstract_Renderer",
            "Frame"
        ],
        "parents": [
            "Abstract_Renderer"
        ],
        "lcom": 1,
        "length": 529,
        "vocabulary": 51,
        "volume": 3000.71,
        "difficulty": 59.23,
        "effort": 177734.54,
        "level": 0.02,
        "bugs": 1,
        "time": 9874,
        "intelligentContent": 50.66,
        "number_operators": 144,
        "number_operands": 385,
        "number_operators_unique": 12,
        "number_operands_unique": 39,
        "cloc": 49,
        "loc": 162,
        "lloc": 113,
        "mi": 61.91,
        "mIwoC": 24.28,
        "commentWeight": 37.63,
        "kanDefect": 2.13,
        "relativeStructuralComplexity": 361,
        "relativeDataComplexity": 0.1,
        "relativeSystemComplexity": 361.1,
        "totalStructuralComplexity": 361,
        "totalDataComplexity": 0.1,
        "totalSystemComplexity": 361.1,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "Javascript_Embedder",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "insert",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "render",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "DOMPDF"
        ],
        "parents": [],
        "lcom": 1,
        "length": 12,
        "vocabulary": 7,
        "volume": 33.69,
        "difficulty": 3.38,
        "effort": 113.7,
        "level": 0.3,
        "bugs": 0.01,
        "time": 6,
        "intelligentContent": 9.98,
        "number_operators": 3,
        "number_operands": 9,
        "number_operators_unique": 3,
        "number_operands_unique": 4,
        "cloc": 16,
        "loc": 36,
        "lloc": 20,
        "mi": 103.59,
        "mIwoC": 60.65,
        "commentWeight": 42.94,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.4,
        "relativeSystemComplexity": 16.4,
        "totalStructuralComplexity": 48,
        "totalDataComplexity": 1.2,
        "totalSystemComplexity": 49.2,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 1,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "Line_Box",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_floats_inside",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_float_offsets",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_block_frame",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_frames",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_frame",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__toString",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 6,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 6,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 0,
        "wmc": 28,
        "ccn": 21,
        "ccnMethodMax": 13,
        "externals": [
            "Block_Frame_Decorator",
            "Frame"
        ],
        "parents": [],
        "lcom": 1,
        "length": 212,
        "vocabulary": 54,
        "volume": 1220.04,
        "difficulty": 23.98,
        "effort": 29250.37,
        "level": 0.04,
        "bugs": 0.41,
        "time": 1625,
        "intelligentContent": 50.89,
        "number_operators": 75,
        "number_operands": 137,
        "number_operators_unique": 14,
        "number_operands_unique": 40,
        "cloc": 68,
        "loc": 185,
        "lloc": 117,
        "mi": 70.8,
        "mIwoC": 30.45,
        "commentWeight": 40.36,
        "kanDefect": 2,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.57,
        "relativeSystemComplexity": 196.57,
        "totalStructuralComplexity": 1568,
        "totalDataComplexity": 4.53,
        "totalSystemComplexity": 1572.53,
        "package": "dompdf\\",
        "pageRank": 0.03,
        "afferentCoupling": 2,
        "efferentCoupling": 2,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "List_Bullet_Frame_Decorator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_margin_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_margin_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 8,
        "ccn": 4,
        "ccnMethodMax": 3,
        "externals": [
            "Frame_Decorator",
            "Frame",
            "DOMPDF",
            "parent"
        ],
        "parents": [
            "Frame_Decorator"
        ],
        "lcom": 2,
        "length": 49,
        "vocabulary": 22,
        "volume": 218.51,
        "difficulty": 6.77,
        "effort": 1478.6,
        "level": 0.15,
        "bugs": 0.07,
        "time": 82,
        "intelligentContent": 32.29,
        "number_operators": 20,
        "number_operands": 29,
        "number_operators_unique": 7,
        "number_operands_unique": 15,
        "cloc": 24,
        "loc": 61,
        "lloc": 37,
        "mi": 90.17,
        "mIwoC": 48.87,
        "commentWeight": 41.29,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 1.28,
        "relativeSystemComplexity": 17.28,
        "totalStructuralComplexity": 80,
        "totalDataComplexity": 6.4,
        "totalSystemComplexity": 86.4,
        "package": "dompdf \\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "List_Bullet_Frame_Reflower",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reflow",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 3,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Frame_Reflower",
            "Frame_Decorator",
            "parent",
            "Frame_Decorator"
        ],
        "parents": [
            "Frame_Reflower"
        ],
        "lcom": 2,
        "length": 19,
        "vocabulary": 9,
        "volume": 60.23,
        "difficulty": 3.5,
        "effort": 210.8,
        "level": 0.29,
        "bugs": 0.02,
        "time": 12,
        "intelligentContent": 17.21,
        "number_operators": 5,
        "number_operands": 14,
        "number_operators_unique": 3,
        "number_operands_unique": 6,
        "cloc": 14,
        "loc": 32,
        "lloc": 18,
        "mi": 102.61,
        "mIwoC": 59.89,
        "commentWeight": 42.73,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 0.14,
        "relativeSystemComplexity": 36.14,
        "totalStructuralComplexity": 72,
        "totalDataComplexity": 0.29,
        "totalSystemComplexity": 72.29,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "List_Bullet_Image_Frame_Decorator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_height",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_margin_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_margin_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_image_url",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 8,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [
            "Frame_Decorator",
            "Frame",
            "DOMPDF",
            "Image_Frame_Decorator",
            "parent"
        ],
        "parents": [
            "Frame_Decorator"
        ],
        "lcom": 1,
        "length": 67,
        "vocabulary": 23,
        "volume": 303.08,
        "difficulty": 12.86,
        "effort": 3896.73,
        "level": 0.08,
        "bugs": 0.1,
        "time": 216,
        "intelligentContent": 23.57,
        "number_operators": 27,
        "number_operands": 40,
        "number_operators_unique": 9,
        "number_operands_unique": 14,
        "cloc": 94,
        "loc": 135,
        "lloc": 41,
        "mi": 95.12,
        "mIwoC": 47.04,
        "commentWeight": 48.08,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 0.9,
        "relativeSystemComplexity": 36.9,
        "totalStructuralComplexity": 216,
        "totalDataComplexity": 5.43,
        "totalSystemComplexity": 221.43,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "List_Bullet_Positioner",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 3,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Positioner",
            "Frame_Decorator",
            "parent"
        ],
        "parents": [
            "Positioner"
        ],
        "lcom": 2,
        "length": 46,
        "vocabulary": 17,
        "volume": 188.02,
        "difficulty": 6.88,
        "effort": 1292.66,
        "level": 0.15,
        "bugs": 0.06,
        "time": 72,
        "intelligentContent": 27.35,
        "number_operators": 13,
        "number_operands": 33,
        "number_operators_unique": 5,
        "number_operands_unique": 12,
        "cloc": 40,
        "loc": 63,
        "lloc": 23,
        "mi": 101.3,
        "mIwoC": 54.1,
        "commentWeight": 47.2,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 121,
        "relativeDataComplexity": 0.04,
        "relativeSystemComplexity": 121.04,
        "totalStructuralComplexity": 242,
        "totalDataComplexity": 0.08,
        "totalSystemComplexity": 242.08,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "List_Bullet_Renderer",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "get_counter_chars",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "make_counter",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "render",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 58,
        "ccn": 56,
        "ccnMethodMax": 23,
        "externals": [
            "Abstract_Renderer",
            "Frame",
            "Image_Cache",
            "Font_Metrics"
        ],
        "parents": [
            "Abstract_Renderer"
        ],
        "lcom": 2,
        "length": 352,
        "vocabulary": 82,
        "volume": 2237.86,
        "difficulty": 35.16,
        "effort": 78674.71,
        "level": 0.03,
        "bugs": 0.75,
        "time": 4371,
        "intelligentContent": 63.65,
        "number_operators": 102,
        "number_operands": 250,
        "number_operators_unique": 18,
        "number_operands_unique": 64,
        "cloc": 27,
        "loc": 184,
        "lloc": 157,
        "mi": 49.07,
        "mIwoC": 21.11,
        "commentWeight": 27.96,
        "kanDefect": 1.3,
        "relativeStructuralComplexity": 361,
        "relativeDataComplexity": 0.33,
        "relativeSystemComplexity": 361.33,
        "totalStructuralComplexity": 1083,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 1084,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 2,
        "efferentCoupling": 4,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "Null_Frame_Decorator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Frame_Decorator",
            "Frame",
            "DOMPDF",
            "parent"
        ],
        "parents": [
            "Frame_Decorator"
        ],
        "lcom": 1,
        "length": 19,
        "vocabulary": 6,
        "volume": 49.11,
        "difficulty": 1.4,
        "effort": 68.76,
        "level": 0.71,
        "bugs": 0.02,
        "time": 4,
        "intelligentContent": 35.08,
        "number_operators": 5,
        "number_operands": 14,
        "number_operators_unique": 1,
        "number_operands_unique": 5,
        "cloc": 13,
        "loc": 26,
        "lloc": 13,
        "mi": 108.18,
        "mIwoC": 63.72,
        "commentWeight": 44.46,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 0.67,
        "relativeSystemComplexity": 4.67,
        "totalStructuralComplexity": 4,
        "totalDataComplexity": 0.67,
        "totalSystemComplexity": 4.67,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Null_Frame_Reflower",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reflow",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Frame_Reflower",
            "Frame",
            "parent",
            "Frame_Decorator"
        ],
        "parents": [
            "Frame_Reflower"
        ],
        "lcom": 2,
        "length": 4,
        "vocabulary": 3,
        "volume": 6.34,
        "difficulty": 0.75,
        "effort": 4.75,
        "level": 1.33,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 8.45,
        "number_operators": 1,
        "number_operands": 3,
        "number_operators_unique": 1,
        "number_operands_unique": 2,
        "cloc": 13,
        "loc": 25,
        "lloc": 12,
        "mi": 115.65,
        "mIwoC": 70.71,
        "commentWeight": 44.94,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1,
        "relativeSystemComplexity": 2,
        "totalStructuralComplexity": 2,
        "totalDataComplexity": 2,
        "totalSystemComplexity": 4,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Null_Positioner",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Positioner",
            "Frame_Decorator",
            "parent"
        ],
        "parents": [
            "Positioner"
        ],
        "lcom": 2,
        "length": 3,
        "vocabulary": 2,
        "volume": 3,
        "difficulty": 1,
        "effort": 3,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 3,
        "number_operators": 1,
        "number_operands": 2,
        "number_operators_unique": 1,
        "number_operands_unique": 1,
        "cloc": 13,
        "loc": 25,
        "lloc": 12,
        "mi": 117.93,
        "mIwoC": 72.98,
        "commentWeight": 44.94,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.75,
        "relativeSystemComplexity": 1.75,
        "totalStructuralComplexity": 2,
        "totalDataComplexity": 1.5,
        "totalSystemComplexity": 3.5,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Page_Frame_Decorator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_renderer",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_renderer",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_containing_block",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "is_full",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "next_page",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "table_reflow_start",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "table_reflow_end",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "in_nested_table",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "check_forced_page_break",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_page_break_allowed",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "check_page_break",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "split",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_floating_frame",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_floating_frames",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "remove_floating_frame",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_lowest_float_offset",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 17,
        "nbMethods": 13,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 12,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 1,
        "wmc": 94,
        "ccn": 78,
        "ccnMethodMax": 34,
        "externals": [
            "Frame_Decorator",
            "Frame",
            "DOMPDF",
            "parent",
            "parent",
            "Frame",
            "Frame",
            "Table_Frame_Decorator",
            "Frame",
            "Frame",
            "Frame"
        ],
        "parents": [
            "Frame_Decorator"
        ],
        "lcom": 2,
        "length": 559,
        "vocabulary": 88,
        "volume": 3610.82,
        "difficulty": 41.66,
        "effort": 150433.98,
        "level": 0.02,
        "bugs": 1.2,
        "time": 8357,
        "intelligentContent": 86.67,
        "number_operators": 211,
        "number_operands": 348,
        "number_operators_unique": 17,
        "number_operands_unique": 71,
        "cloc": 209,
        "loc": 525,
        "lloc": 316,
        "mi": 51.52,
        "mIwoC": 10.07,
        "commentWeight": 41.45,
        "kanDefect": 5.55,
        "relativeStructuralComplexity": 400,
        "relativeDataComplexity": 1.76,
        "relativeSystemComplexity": 401.76,
        "totalStructuralComplexity": 6800,
        "totalDataComplexity": 29.86,
        "totalSystemComplexity": 6829.86,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 2,
        "efferentCoupling": 5,
        "instability": 0.71,
        "violations": {}
    },
    {
        "name": "Page_Frame_Reflower",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_frame_to_stacking_context",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "apply_page_style",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reflow",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_check_callbacks",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 33,
        "ccn": 29,
        "ccnMethodMax": 12,
        "externals": [
            "Frame_Reflower",
            "Page_Frame_Decorator",
            "parent",
            "Frame",
            "Frame",
            "Frame_Decorator"
        ],
        "parents": [
            "Frame_Reflower"
        ],
        "lcom": 2,
        "length": 277,
        "vocabulary": 63,
        "volume": 1655.71,
        "difficulty": 21.68,
        "effort": 35900.18,
        "level": 0.05,
        "bugs": 0.55,
        "time": 1994,
        "intelligentContent": 76.36,
        "number_operators": 72,
        "number_operands": 205,
        "number_operators_unique": 11,
        "number_operands_unique": 52,
        "cloc": 59,
        "loc": 184,
        "lloc": 125,
        "mi": 66.27,
        "mIwoC": 27.82,
        "commentWeight": 38.45,
        "kanDefect": 2.65,
        "relativeStructuralComplexity": 576,
        "relativeDataComplexity": 0.06,
        "relativeSystemComplexity": 576.06,
        "totalStructuralComplexity": 2880,
        "totalDataComplexity": 0.32,
        "totalSystemComplexity": 2880.32,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 5,
        "instability": 0.83,
        "violations": {}
    },
    {
        "name": "PDFLib_Adapter",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_close",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_pdflib",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_info",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "open_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reopen_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "close_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "stop_object",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_place_objects",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_width",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_height",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_page_number",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_page_count",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_page_number",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_page_count",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_line_style",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_stroke_color",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_fill_color",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_opacity",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_default_view",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_load_font",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "y",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "line",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "rectangle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "filled_rectangle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "clipping_rectangle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "clipping_end",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "save",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "restore",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "rotate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "skew",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "scale",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "translate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "transform",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "polygon",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "circle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "image",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "text",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "javascript",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_named_dest",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_link",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_text_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_font_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_font_baseline",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "page_text",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "page_script",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new_page",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_add_page_text",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "stream",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "output",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 51,
        "nbMethods": 44,
        "nbMethodsPrivate": 8,
        "nbMethodsPublic": 36,
        "nbMethodsGetter": 5,
        "nbMethodsSetters": 2,
        "wmc": 136,
        "ccn": 86,
        "ccnMethodMax": 15,
        "externals": [
            "Canvas",
            "PDFLib",
            "Font_Metrics",
            "DOMPDF_Exception",
            "Image_Cache",
            "Image_Cache",
            "Font_Metrics",
            "PHP_Evaluator",
            "DOMPDF_Exception"
        ],
        "parents": [],
        "lcom": 3,
        "length": 1383,
        "vocabulary": 232,
        "volume": 10867.59,
        "difficulty": 63.23,
        "effort": 687165.93,
        "level": 0.02,
        "bugs": 3.62,
        "time": 38176,
        "intelligentContent": 171.87,
        "number_operators": 287,
        "number_operands": 1096,
        "number_operators_unique": 24,
        "number_operands_unique": 208,
        "cloc": 309,
        "loc": 907,
        "lloc": 598,
        "mi": 39.3,
        "mIwoC": 0,
        "commentWeight": 39.3,
        "kanDefect": 5.69,
        "relativeStructuralComplexity": 3364,
        "relativeDataComplexity": 0.35,
        "relativeSystemComplexity": 3364.35,
        "totalStructuralComplexity": 171564,
        "totalDataComplexity": 17.63,
        "totalSystemComplexity": 171581.63,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "PHP_Evaluator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "evaluate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "render",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [
            "Canvas"
        ],
        "parents": [],
        "lcom": 1,
        "length": 28,
        "vocabulary": 14,
        "volume": 106.61,
        "difficulty": 2.86,
        "effort": 305.28,
        "level": 0.35,
        "bugs": 0.04,
        "time": 17,
        "intelligentContent": 37.23,
        "number_operators": 7,
        "number_operands": 21,
        "number_operators_unique": 3,
        "number_operands_unique": 11,
        "cloc": 19,
        "loc": 45,
        "lloc": 26,
        "mi": 96.78,
        "mIwoC": 54.53,
        "commentWeight": 42.25,
        "kanDefect": 0.45,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.47,
        "relativeSystemComplexity": 16.47,
        "totalStructuralComplexity": 48,
        "totalDataComplexity": 1.4,
        "totalSystemComplexity": 49.4,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 3,
        "efferentCoupling": 1,
        "instability": 0.25,
        "violations": {}
    },
    {
        "name": "Positioner",
        "interface": false,
        "abstract": true,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__destruct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "move",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 6,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [
            "Frame_Decorator"
        ],
        "parents": [],
        "lcom": 3,
        "length": 26,
        "vocabulary": 11,
        "volume": 89.95,
        "difficulty": 3.94,
        "effort": 354.16,
        "level": 0.25,
        "bugs": 0.03,
        "time": 20,
        "intelligentContent": 22.84,
        "number_operators": 5,
        "number_operands": 21,
        "number_operators_unique": 3,
        "number_operands_unique": 8,
        "cloc": 23,
        "loc": 47,
        "lloc": 24,
        "mi": 99.99,
        "mIwoC": 55.81,
        "commentWeight": 44.19,
        "kanDefect": 0.45,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.2,
        "relativeSystemComplexity": 16.2,
        "totalStructuralComplexity": 64,
        "totalDataComplexity": 0.8,
        "totalSystemComplexity": 64.8,
        "package": "dompdf\\",
        "pageRank": 0.01,
        "afferentCoupling": 9,
        "efferentCoupling": 1,
        "instability": 0.1,
        "violations": {}
    },
    {
        "name": "Renderer",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__destruct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new_page",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "render",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_check_callbacks",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_render_frame",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 60,
        "ccn": 56,
        "ccnMethodMax": 40,
        "externals": [
            "Abstract_Renderer",
            "Frame",
            "Block_Renderer",
            "Inline_Renderer",
            "Text_Renderer",
            "Image_Renderer",
            "Table_Cell_Renderer",
            "Table_Row_Group_Renderer",
            "List_Bullet_Renderer",
            "PHP_Evaluator",
            "Javascript_Embedder"
        ],
        "parents": [
            "Abstract_Renderer"
        ],
        "lcom": 2,
        "length": 311,
        "vocabulary": 67,
        "volume": 1886.55,
        "difficulty": 18.39,
        "effort": 34689.82,
        "level": 0.05,
        "bugs": 0.63,
        "time": 1927,
        "intelligentContent": 102.6,
        "number_operators": 74,
        "number_operands": 237,
        "number_operators_unique": 9,
        "number_operands_unique": 58,
        "cloc": 65,
        "loc": 232,
        "lloc": 167,
        "mi": 57.6,
        "mIwoC": 21.05,
        "commentWeight": 36.56,
        "kanDefect": 2.54,
        "relativeStructuralComplexity": 400,
        "relativeDataComplexity": 0.15,
        "relativeSystemComplexity": 400.15,
        "totalStructuralComplexity": 2000,
        "totalDataComplexity": 0.76,
        "totalSystemComplexity": 2000.76,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 11,
        "instability": 0.92,
        "violations": {}
    },
    {
        "name": "Style",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "dispose",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_frame",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_frame",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_origin",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_origin",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_stylesheet",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "length_in_pt",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "inherit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "merge",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "munge_colour",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "munge_color",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "important_set",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "important_get",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__set",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__get",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_font_family_raw",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_font_family",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_font_size",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_word_spacing",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_letter_spacing",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_line_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_color",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_background_color",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_background_position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_background_attachment",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_background_repeat",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_background",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_top_color",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_right_color",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_bottom_color",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_left_color",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_top_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_right_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_bottom_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_left_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_properties",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_get_border",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_top",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_right",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_bottom",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_left",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_outline_color",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_outline_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_outline",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_border_spacing",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_style_side_type",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_style_sides_type",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_style_type",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_style_type_important",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_style_side_width_important",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_style",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_image",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_color",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_background_color",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_background_image",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_background_repeat",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_background_attachment",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_background_position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_background",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_font_size",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_font",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_page_break_before",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_page_break_after",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_margin_top",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_margin_right",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_margin_bottom",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_margin_left",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_margin",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_padding_top",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_padding_right",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_padding_bottom",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_padding_left",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_padding",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_border",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_border_top",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_border_right",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_border_bottom",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_border_left",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_border",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_border_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_border_color",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_border_style",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_outline",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_outline_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_outline_color",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_outline_style",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_border_spacing",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_list_style_image",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_list_style",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_size",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_transform",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set__webkit_transform",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set__webkit_transform_origin",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_transform_origin",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "parse_image_resolution",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_background_image_resolution",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_image_resolution",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set__dompdf_background_image_resolution",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set__dompdf_image_resolution",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_z_index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_counter_increment",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__toString",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "debug_print",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 104,
        "nbMethods": 100,
        "nbMethodsPrivate": 10,
        "nbMethodsPublic": 90,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 1,
        "wmc": 327,
        "ccn": 224,
        "ccnMethodMax": 23,
        "externals": [
            "Stylesheet",
            "Frame",
            "Style",
            "Style",
            "CSS_Color",
            "CSS_Color",
            "DOMPDF_Exception",
            "Font_Metrics",
            "Font_Metrics",
            "DOMPDF_Exception"
        ],
        "parents": [],
        "lcom": 2,
        "length": 3282,
        "vocabulary": 416,
        "volume": 28554.84,
        "difficulty": 55.47,
        "effort": 1583932.85,
        "level": 0.02,
        "bugs": 9.52,
        "time": 87996,
        "intelligentContent": 514.78,
        "number_operators": 829,
        "number_operands": 2453,
        "number_operators_unique": 18,
        "number_operands_unique": 398,
        "cloc": 632,
        "loc": 2034,
        "lloc": 1402,
        "mi": 38.01,
        "mIwoC": 0,
        "commentWeight": 38.01,
        "kanDefect": 13.9,
        "relativeStructuralComplexity": 1024,
        "relativeDataComplexity": 1.94,
        "relativeSystemComplexity": 1025.94,
        "totalStructuralComplexity": 106496,
        "totalDataComplexity": 201.36,
        "totalSystemComplexity": 106697.36,
        "package": "dompdf\\",
        "pageRank": 0.04,
        "afferentCoupling": 5,
        "efferentCoupling": 7,
        "instability": 0.58,
        "violations": {}
    },
    {
        "name": "Stylesheet",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__destruct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_protocol",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_host",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_base_path",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_dompdf",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_protocol",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_host",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_base_path",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_page_styles",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_style",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "lookup",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "create_style",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "load_css",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "load_css_file",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_specificity",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_css_selector_to_xpath",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_selector_an_plus_b",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "apply_styles",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_parse_css",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_image",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_parse_import",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_parse_font_face",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_parse_properties",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_parse_sections",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__toString",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 26,
        "nbMethods": 18,
        "nbMethodsPrivate": 9,
        "nbMethodsPublic": 9,
        "nbMethodsGetter": 5,
        "nbMethodsSetters": 3,
        "wmc": 207,
        "ccn": 182,
        "ccnMethodMax": 70,
        "externals": [
            "DOMPDF",
            "Style",
            "DOMPDF_Exception",
            "Style",
            "Style",
            "DOMPDF_Exception",
            "DOMPDF_Exception",
            "Frame_Tree",
            "DOMXPath",
            "Attribute_Translator",
            "DOMPDF_Exception",
            "Font_Metrics",
            "Style"
        ],
        "parents": [],
        "lcom": 2,
        "length": 1646,
        "vocabulary": 324,
        "volume": 13727.39,
        "difficulty": 39.47,
        "effort": 541870.78,
        "level": 0.03,
        "bugs": 4.58,
        "time": 30104,
        "intelligentContent": 347.76,
        "number_operators": 446,
        "number_operands": 1200,
        "number_operators_unique": 20,
        "number_operands_unique": 304,
        "cloc": 509,
        "loc": 1170,
        "lloc": 663,
        "mi": 42.65,
        "mIwoC": 0,
        "commentWeight": 42.65,
        "kanDefect": 13.4,
        "relativeStructuralComplexity": 1521,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1521.5,
        "totalStructuralComplexity": 39546,
        "totalDataComplexity": 12.95,
        "totalSystemComplexity": 39558.95,
        "package": "dompdf\\",
        "pageRank": 0.01,
        "afferentCoupling": 2,
        "efferentCoupling": 7,
        "instability": 0.78,
        "violations": {}
    },
    {
        "name": "Table_Cell_Frame_Decorator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reset",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_content_height",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_content_height",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_cell_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_resolved_border",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_resolved_border",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_resolved_borders",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 1,
        "wmc": 16,
        "ccn": 9,
        "ccnMethodMax": 9,
        "externals": [
            "Block_Frame_Decorator",
            "Frame",
            "DOMPDF",
            "parent",
            "parent"
        ],
        "parents": [
            "Block_Frame_Decorator"
        ],
        "lcom": 1,
        "length": 91,
        "vocabulary": 25,
        "volume": 422.59,
        "difficulty": 12.83,
        "effort": 5423.25,
        "level": 0.08,
        "bugs": 0.14,
        "time": 301,
        "intelligentContent": 32.93,
        "number_operators": 25,
        "number_operands": 66,
        "number_operators_unique": 7,
        "number_operands_unique": 18,
        "cloc": 20,
        "loc": 88,
        "lloc": 68,
        "mi": 74.09,
        "mIwoC": 40.43,
        "commentWeight": 33.66,
        "kanDefect": 0.97,
        "relativeStructuralComplexity": 49,
        "relativeDataComplexity": 0.61,
        "relativeSystemComplexity": 49.61,
        "totalStructuralComplexity": 392,
        "totalDataComplexity": 4.88,
        "totalSystemComplexity": 396.88,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Table_Cell_Frame_Reflower",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reflow",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 7,
        "ccn": 6,
        "ccnMethodMax": 6,
        "externals": [
            "Block_Frame_Reflower",
            "Frame",
            "parent",
            "Frame_Decorator",
            "Table_Frame_Decorator"
        ],
        "parents": [
            "Block_Frame_Reflower"
        ],
        "lcom": 2,
        "length": 161,
        "vocabulary": 38,
        "volume": 844.92,
        "difficulty": 14,
        "effort": 11828.83,
        "level": 0.07,
        "bugs": 0.28,
        "time": 657,
        "intelligentContent": 60.35,
        "number_operators": 37,
        "number_operands": 124,
        "number_operators_unique": 7,
        "number_operands_unique": 31,
        "cloc": 21,
        "loc": 76,
        "lloc": 55,
        "mi": 77.1,
        "mIwoC": 40.74,
        "commentWeight": 36.36,
        "kanDefect": 0.98,
        "relativeStructuralComplexity": 576,
        "relativeDataComplexity": 0.04,
        "relativeSystemComplexity": 576.04,
        "totalStructuralComplexity": 1152,
        "totalDataComplexity": 0.08,
        "totalSystemComplexity": 1152.08,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Table_Cell_Positioner",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Positioner",
            "Frame_Decorator",
            "parent",
            "Table_Frame_Decorator"
        ],
        "parents": [
            "Positioner"
        ],
        "lcom": 2,
        "length": 11,
        "vocabulary": 5,
        "volume": 25.54,
        "difficulty": 1.13,
        "effort": 28.73,
        "level": 0.89,
        "bugs": 0.01,
        "time": 2,
        "intelligentContent": 22.7,
        "number_operators": 2,
        "number_operands": 9,
        "number_operators_unique": 1,
        "number_operands_unique": 4,
        "cloc": 14,
        "loc": 28,
        "lloc": 14,
        "mi": 109.47,
        "mIwoC": 65.01,
        "commentWeight": 44.46,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 0.08,
        "relativeSystemComplexity": 25.08,
        "totalStructuralComplexity": 50,
        "totalDataComplexity": 0.17,
        "totalSystemComplexity": 50.17,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Table_Cell_Renderer",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "render",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 21,
        "ccn": 21,
        "ccnMethodMax": 21,
        "externals": [
            "Block_Renderer",
            "Frame",
            "Table_Frame_Decorator"
        ],
        "parents": [
            "Block_Renderer"
        ],
        "lcom": 1,
        "length": 436,
        "vocabulary": 60,
        "volume": 2575.4,
        "difficulty": 45.91,
        "effort": 118249.41,
        "level": 0.02,
        "bugs": 0.86,
        "time": 6569,
        "intelligentContent": 56.09,
        "number_operators": 104,
        "number_operands": 332,
        "number_operators_unique": 13,
        "number_operands_unique": 47,
        "cloc": 23,
        "loc": 112,
        "lloc": 89,
        "mi": 63.06,
        "mIwoC": 30.77,
        "commentWeight": 32.29,
        "kanDefect": 1.45,
        "relativeStructuralComplexity": 324,
        "relativeDataComplexity": 0.16,
        "relativeSystemComplexity": 324.16,
        "totalStructuralComplexity": 324,
        "totalDataComplexity": 0.16,
        "totalSystemComplexity": 324.16,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "Table_Frame_Decorator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reset",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "split",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "copy",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "find_parent_table",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_cellmap",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_min_width",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_max_width",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_min_width",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_max_width",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "normalise",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "move_after",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 12,
        "nbMethods": 7,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 7,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 2,
        "wmc": 35,
        "ccn": 24,
        "ccnMethodMax": 14,
        "externals": [
            "Frame_Decorator",
            "Frame",
            "DOMPDF",
            "parent",
            "Cellmap",
            "parent",
            "parent",
            "parent",
            "parent",
            "parent",
            "DomNode",
            "parent",
            "Frame",
            "Frame",
            "Frame_Factory",
            "Frame"
        ],
        "parents": [
            "Frame_Decorator"
        ],
        "lcom": 2,
        "length": 227,
        "vocabulary": 35,
        "volume": 1164.35,
        "difficulty": 16.55,
        "effort": 19271.95,
        "level": 0.06,
        "bugs": 0.39,
        "time": 1071,
        "intelligentContent": 70.35,
        "number_operators": 67,
        "number_operands": 160,
        "number_operators_unique": 6,
        "number_operands_unique": 29,
        "cloc": 121,
        "loc": 287,
        "lloc": 166,
        "mi": 69.11,
        "mIwoC": 26.87,
        "commentWeight": 42.23,
        "kanDefect": 2.58,
        "relativeStructuralComplexity": 900,
        "relativeDataComplexity": 0.22,
        "relativeSystemComplexity": 900.22,
        "totalStructuralComplexity": 10800,
        "totalDataComplexity": 2.61,
        "totalSystemComplexity": 10802.61,
        "package": "dompdf\\",
        "pageRank": 0.01,
        "afferentCoupling": 9,
        "efferentCoupling": 7,
        "instability": 0.44,
        "violations": {}
    },
    {
        "name": "Table_Frame_Reflower",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reset",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_assign_widths",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_calculate_height",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reflow",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_min_max_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 6,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 85,
        "ccn": 80,
        "ccnMethodMax": 43,
        "externals": [
            "Frame_Reflower",
            "Table_Frame_Decorator",
            "parent",
            "Frame_Decorator"
        ],
        "parents": [
            "Frame_Reflower"
        ],
        "lcom": 1,
        "length": 1023,
        "vocabulary": 83,
        "volume": 6521.67,
        "difficulty": 98.86,
        "effort": 644741.87,
        "level": 0.01,
        "bugs": 2.17,
        "time": 35819,
        "intelligentContent": 65.97,
        "number_operators": 309,
        "number_operands": 714,
        "number_operators_unique": 18,
        "number_operands_unique": 65,
        "cloc": 98,
        "loc": 442,
        "lloc": 344,
        "mi": 40.52,
        "mIwoC": 7.2,
        "commentWeight": 33.32,
        "kanDefect": 6.34,
        "relativeStructuralComplexity": 1225,
        "relativeDataComplexity": 0.29,
        "relativeSystemComplexity": 1225.29,
        "totalStructuralComplexity": 7350,
        "totalDataComplexity": 1.72,
        "totalSystemComplexity": 7351.72,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Table_Row_Frame_Decorator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "normalise",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 4,
        "ccnMethodMax": 4,
        "externals": [
            "Frame_Decorator",
            "Frame",
            "DOMPDF",
            "parent",
            "Table_Frame_Decorator"
        ],
        "parents": [
            "Frame_Decorator"
        ],
        "lcom": 2,
        "length": 25,
        "vocabulary": 11,
        "volume": 86.49,
        "difficulty": 3.56,
        "effort": 308.11,
        "level": 0.28,
        "bugs": 0.03,
        "time": 17,
        "intelligentContent": 24.28,
        "number_operators": 6,
        "number_operands": 19,
        "number_operators_unique": 3,
        "number_operands_unique": 8,
        "cloc": 21,
        "loc": 43,
        "lloc": 22,
        "mi": 100.78,
        "mIwoC": 56.62,
        "commentWeight": 44.16,
        "kanDefect": 0.68,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 0.17,
        "relativeSystemComplexity": 25.17,
        "totalStructuralComplexity": 50,
        "totalDataComplexity": 0.33,
        "totalSystemComplexity": 50.33,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 5,
        "instability": 0.83,
        "violations": {}
    },
    {
        "name": "Table_Row_Frame_Reflower",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reflow",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_min_max_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 7,
        "ccn": 5,
        "ccnMethodMax": 5,
        "externals": [
            "Frame_Reflower",
            "Table_Row_Frame_Decorator",
            "parent",
            "Frame_Decorator",
            "Table_Frame_Decorator",
            "DOMPDF_Exception"
        ],
        "parents": [
            "Frame_Reflower"
        ],
        "lcom": 3,
        "length": 45,
        "vocabulary": 13,
        "volume": 166.52,
        "difficulty": 4.8,
        "effort": 799.29,
        "level": 0.21,
        "bugs": 0.06,
        "time": 44,
        "intelligentContent": 34.69,
        "number_operators": 13,
        "number_operands": 32,
        "number_operators_unique": 3,
        "number_operands_unique": 10,
        "cloc": 15,
        "loc": 52,
        "lloc": 37,
        "mi": 86.53,
        "mIwoC": 49.56,
        "commentWeight": 36.97,
        "kanDefect": 0.59,
        "relativeStructuralComplexity": 225,
        "relativeDataComplexity": 0.23,
        "relativeSystemComplexity": 225.23,
        "totalStructuralComplexity": 675,
        "totalDataComplexity": 0.69,
        "totalSystemComplexity": 675.69,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Table_Row_Group_Frame_Decorator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "split",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 4,
        "ccnMethodMax": 4,
        "externals": [
            "Frame_Decorator",
            "Frame",
            "DOMPDF",
            "parent",
            "parent",
            "parent",
            "parent"
        ],
        "parents": [
            "Frame_Decorator"
        ],
        "lcom": 2,
        "length": 33,
        "vocabulary": 12,
        "volume": 118.3,
        "difficulty": 8.57,
        "effort": 1014.03,
        "level": 0.12,
        "bugs": 0.04,
        "time": 56,
        "intelligentContent": 13.8,
        "number_operators": 9,
        "number_operands": 24,
        "number_operators_unique": 5,
        "number_operands_unique": 7,
        "cloc": 29,
        "loc": 57,
        "lloc": 28,
        "mi": 98.05,
        "mIwoC": 53.38,
        "commentWeight": 44.67,
        "kanDefect": 0.52,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 0.4,
        "relativeSystemComplexity": 81.4,
        "totalStructuralComplexity": 162,
        "totalDataComplexity": 0.8,
        "totalSystemComplexity": 162.8,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Table_Row_Group_Frame_Reflower",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reflow",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 6,
        "ccn": 5,
        "ccnMethodMax": 5,
        "externals": [
            "Frame_Reflower",
            "parent",
            "Frame_Decorator",
            "Table_Frame_Decorator"
        ],
        "parents": [
            "Frame_Reflower"
        ],
        "lcom": 2,
        "length": 56,
        "vocabulary": 19,
        "volume": 237.88,
        "difficulty": 5.6,
        "effort": 1332.15,
        "level": 0.18,
        "bugs": 0.08,
        "time": 74,
        "intelligentContent": 42.48,
        "number_operators": 14,
        "number_operands": 42,
        "number_operators_unique": 4,
        "number_operands_unique": 15,
        "cloc": 17,
        "loc": 50,
        "lloc": 33,
        "mi": 88.83,
        "mIwoC": 49.56,
        "commentWeight": 39.27,
        "kanDefect": 0.59,
        "relativeStructuralComplexity": 225,
        "relativeDataComplexity": 0.19,
        "relativeSystemComplexity": 225.19,
        "totalStructuralComplexity": 450,
        "totalDataComplexity": 0.38,
        "totalSystemComplexity": 450.38,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Table_Row_Group_Renderer",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "render",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 8,
        "ccn": 8,
        "ccnMethodMax": 8,
        "externals": [
            "Block_Renderer",
            "Frame"
        ],
        "parents": [
            "Block_Renderer"
        ],
        "lcom": 1,
        "length": 34,
        "vocabulary": 10,
        "volume": 112.95,
        "difficulty": 5.79,
        "effort": 653.47,
        "level": 0.17,
        "bugs": 0.04,
        "time": 36,
        "intelligentContent": 19.52,
        "number_operators": 7,
        "number_operands": 27,
        "number_operators_unique": 3,
        "number_operands_unique": 7,
        "cloc": 14,
        "loc": 36,
        "lloc": 22,
        "mi": 96.4,
        "mIwoC": 55.27,
        "commentWeight": 41.13,
        "kanDefect": 0.59,
        "relativeStructuralComplexity": 100,
        "relativeDataComplexity": 0.09,
        "relativeSystemComplexity": 100.09,
        "totalStructuralComplexity": 100,
        "totalDataComplexity": 0.09,
        "totalSystemComplexity": 100.09,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "Table_Row_Positioner",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "position",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 3,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Positioner",
            "Frame_Decorator",
            "parent"
        ],
        "parents": [
            "Positioner"
        ],
        "lcom": 2,
        "length": 24,
        "vocabulary": 9,
        "volume": 76.08,
        "difficulty": 4.5,
        "effort": 342.35,
        "level": 0.22,
        "bugs": 0.03,
        "time": 19,
        "intelligentContent": 16.91,
        "number_operators": 6,
        "number_operands": 18,
        "number_operators_unique": 3,
        "number_operands_unique": 6,
        "cloc": 14,
        "loc": 33,
        "lloc": 19,
        "mi": 100.98,
        "mIwoC": 58.66,
        "commentWeight": 42.32,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 0.07,
        "relativeSystemComplexity": 36.07,
        "totalStructuralComplexity": 72,
        "totalDataComplexity": 0.14,
        "totalSystemComplexity": 72.14,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "TCPDF_Adapter",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "y",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_stroke_colour",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_set_fill_colour",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_tcpdf",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_page_number",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_page_count",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_page_count",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "line",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "rectangle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "filled_rectangle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "polygon",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "circle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "image",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "text",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "javascript",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_named_dest",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_link",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add_info",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_text_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_font_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new_page",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "stream",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "output",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 24,
        "nbMethods": 20,
        "nbMethodsPrivate": 3,
        "nbMethodsPublic": 17,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 1,
        "wmc": 37,
        "ccn": 14,
        "ccnMethodMax": 4,
        "externals": [
            "Canvas",
            "TCPDF"
        ],
        "parents": [],
        "lcom": 13,
        "length": 285,
        "vocabulary": 63,
        "volume": 1703.52,
        "difficulty": 19.08,
        "effort": 32508.93,
        "level": 0.05,
        "bugs": 0.57,
        "time": 1806,
        "intelligentContent": 89.27,
        "number_operators": 56,
        "number_operands": 229,
        "number_operators_unique": 9,
        "number_operands_unique": 54,
        "cloc": 283,
        "loc": 426,
        "lloc": 143,
        "mi": 76.12,
        "mIwoC": 28.47,
        "commentWeight": 47.65,
        "kanDefect": 0.71,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 0.68,
        "relativeSystemComplexity": 81.68,
        "totalStructuralComplexity": 1944,
        "totalDataComplexity": 16.4,
        "totalSystemComplexity": 1960.4,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Text_Frame_Decorator",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reset",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_text_spacing",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_text",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_margin_height",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_padding_box",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_text_spacing",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "recalculate_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "split_text",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete_text",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set_text",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 11,
        "nbMethods": 10,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 10,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 15,
        "ccn": 5,
        "ccnMethodMax": 4,
        "externals": [
            "Frame_Decorator",
            "Frame",
            "DOMPDF",
            "DOMPDF_Exception",
            "parent",
            "parent",
            "Font_Metrics",
            "Font_Metrics",
            "Font_Metrics",
            "DOMText"
        ],
        "parents": [
            "Frame_Decorator"
        ],
        "lcom": 1,
        "length": 148,
        "vocabulary": 31,
        "volume": 733.22,
        "difficulty": 15.46,
        "effort": 11334.38,
        "level": 0.06,
        "bugs": 0.24,
        "time": 630,
        "intelligentContent": 47.43,
        "number_operators": 42,
        "number_operands": 106,
        "number_operators_unique": 7,
        "number_operands_unique": 24,
        "cloc": 62,
        "loc": 149,
        "lloc": 87,
        "mi": 79.01,
        "mIwoC": 36.96,
        "commentWeight": 42.06,
        "kanDefect": 0.43,
        "relativeStructuralComplexity": 289,
        "relativeDataComplexity": 0.42,
        "relativeSystemComplexity": 289.42,
        "totalStructuralComplexity": 3179,
        "totalDataComplexity": 4.67,
        "totalSystemComplexity": 3183.67,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 7,
        "instability": 0.88,
        "violations": {}
    },
    {
        "name": "Text_Frame_Reflower",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_collapse_white_space",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_line_break",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_newline_break",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_layout_line",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reflow",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_min_max_width",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 7,
        "nbMethods": 7,
        "nbMethodsPrivate": 4,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 58,
        "ccn": 52,
        "ccnMethodMax": 29,
        "externals": [
            "Frame_Reflower",
            "Text_Frame_Decorator",
            "parent",
            "Font_Metrics",
            "Font_Metrics",
            "Font_Metrics",
            "Font_Metrics",
            "Frame_Decorator",
            "Font_Metrics",
            "Font_Metrics"
        ],
        "parents": [
            "Frame_Reflower"
        ],
        "lcom": 2,
        "length": 629,
        "vocabulary": 86,
        "volume": 4042.12,
        "difficulty": 56.25,
        "effort": 227369.28,
        "level": 0.02,
        "bugs": 1.35,
        "time": 12632,
        "intelligentContent": 71.86,
        "number_operators": 204,
        "number_operands": 425,
        "number_operators_unique": 18,
        "number_operands_unique": 68,
        "cloc": 93,
        "loc": 341,
        "lloc": 248,
        "mi": 51.7,
        "mIwoC": 15.52,
        "commentWeight": 36.18,
        "kanDefect": 2.57,
        "relativeStructuralComplexity": 625,
        "relativeDataComplexity": 0.37,
        "relativeSystemComplexity": 625.37,
        "totalStructuralComplexity": 4375,
        "totalDataComplexity": 2.62,
        "totalSystemComplexity": 4377.62,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Text_Renderer",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "render",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 19,
        "ccn": 19,
        "ccnMethodMax": 19,
        "externals": [
            "Abstract_Renderer",
            "Frame",
            "Font_Metrics"
        ],
        "parents": [
            "Abstract_Renderer"
        ],
        "lcom": 1,
        "length": 270,
        "vocabulary": 67,
        "volume": 1637.84,
        "difficulty": 20.7,
        "effort": 33909.44,
        "level": 0.05,
        "bugs": 0.55,
        "time": 1884,
        "intelligentContent": 79.11,
        "number_operators": 98,
        "number_operands": 172,
        "number_operators_unique": 13,
        "number_operands_unique": 54,
        "cloc": 45,
        "loc": 131,
        "lloc": 86,
        "mi": 72.15,
        "mIwoC": 32.74,
        "commentWeight": 39.41,
        "kanDefect": 1.39,
        "relativeStructuralComplexity": 169,
        "relativeDataComplexity": 0.14,
        "relativeSystemComplexity": 169.14,
        "totalStructuralComplexity": 169,
        "totalDataComplexity": 0.14,
        "totalSystemComplexity": 169.14,
        "package": "dompdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "Cpdf",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_destination",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_viewerPreferences",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_catalog",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_pages",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_outlines",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_font",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_fontDescriptor",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_fontEncoding",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_fontDescendentCID",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_fontGIDtoCIDMap",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_procset",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_info",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_action",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_annotation",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_page",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_contents",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_embedjs",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_javascript",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_image",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_extGState",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "o_encryption",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "md5_16",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "encryptInit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "ARC4_init",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "ARC4",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addLink",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addInternalLink",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setEncryption",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "checkAllHere",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "output",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "newDocument",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "openFont",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "selectFont",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCurrentFont",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFirstPageId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addContent",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setColor",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setStrokeColor",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setGraphicsState",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLineTransparency",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setFillTransparency",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "line",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "curve",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "partEllipse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "filledEllipse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "ellipse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLineStyle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "polygon",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "filledRectangle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "rectangle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "save",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "restore",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "clippingRectangle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "clippingEnd",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "scale",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "translate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "rotate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "skew",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "transform",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "newPage",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "stream",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFontHeight",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFontXHeight",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFontDescender",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "filterText",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "utf8toCodePointsArray",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "utf8toUtf16BE",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "PRVTgetTextPosition",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "PRVTcheckTextDirective",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "PRVTcheckTextDirective1",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "toUpper",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "concatMatches",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "registerText",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addText",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTextWidth",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "PRVTadjustWrapText",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addTextWrap",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "saveState",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "restoreState",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "openObject",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reopenObject",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "closeObject",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "stopObject",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addObject",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "serializeObject",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "restoreSerializedObject",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addInfo",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPreferences",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "PRVT_getBytes",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "image_iscached",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addImagePng",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addImagePngAlpha",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addPngFromFile",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addPngFromBuf",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addJpegFromFile",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addJpegImage_common",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "openHere",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addJavascript",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addDestination",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setFontFamily",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addMessage",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "transaction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 103,
        "nbMethods": 102,
        "nbMethodsPrivate": 22,
        "nbMethodsPublic": 80,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 802,
        "ccn": 700,
        "ccnMethodMax": 67,
        "externals": [
            "Font",
            "Font",
            "Gmagick",
            "Gmagick",
            "Gmagick",
            "Imagick",
            "Imagick"
        ],
        "parents": [],
        "lcom": 2,
        "length": 9156,
        "vocabulary": 990,
        "volume": 91113.96,
        "difficulty": 115.19,
        "effort": 10495415.48,
        "level": 0.01,
        "bugs": 30.37,
        "time": 583079,
        "intelligentContent": 790.99,
        "number_operators": 2259,
        "number_operands": 6897,
        "number_operators_unique": 32,
        "number_operands_unique": 958,
        "cloc": 1173,
        "loc": 4234,
        "lloc": 3061,
        "mi": 36.4,
        "mIwoC": 0,
        "commentWeight": 36.4,
        "kanDefect": 44.77,
        "relativeStructuralComplexity": 7056,
        "relativeDataComplexity": 0.87,
        "relativeSystemComplexity": 7056.87,
        "totalStructuralComplexity": 726768,
        "totalDataComplexity": 89.61,
        "totalSystemComplexity": 726857.61,
        "package": "Cpdf\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "HTML5_Data",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "getRealCodepoint",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNamedCharacterReferences",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "utf8chr",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 11,
        "ccn": 9,
        "ccnMethodMax": 7,
        "externals": [],
        "parents": [],
        "lcom": 3,
        "length": 180,
        "vocabulary": 95,
        "volume": 1182.57,
        "difficulty": 6.8,
        "effort": 8044.25,
        "level": 0.15,
        "bugs": 0.39,
        "time": 447,
        "intelligentContent": 173.85,
        "number_operators": 50,
        "number_operands": 130,
        "number_operators_unique": 9,
        "number_operands_unique": 86,
        "cloc": 58,
        "loc": 147,
        "lloc": 89,
        "mi": 76.08,
        "mIwoC": 34.75,
        "commentWeight": 41.33,
        "kanDefect": 0.71,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 4.67,
        "relativeSystemComplexity": 4.67,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 14,
        "totalSystemComplexity": 14,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "HTML5_InputStream",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCurrentLine",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getColumnOffset",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "char",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "remainingChars",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "charsUntil",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "charsWhile",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "unget",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 8,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 8,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 27,
        "ccn": 20,
        "ccnMethodMax": 6,
        "externals": [
            "Exception"
        ],
        "parents": [],
        "lcom": 1,
        "length": 234,
        "vocabulary": 48,
        "volume": 1306.88,
        "difficulty": 26.67,
        "effort": 34850.17,
        "level": 0.04,
        "bugs": 0.44,
        "time": 1936,
        "intelligentContent": 49.01,
        "number_operators": 74,
        "number_operands": 160,
        "number_operators_unique": 12,
        "number_operands_unique": 36,
        "cloc": 120,
        "loc": 241,
        "lloc": 122,
        "mi": 74.38,
        "mIwoC": 29.98,
        "commentWeight": 44.4,
        "kanDefect": 0.99,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 13.63,
        "relativeSystemComplexity": 13.63,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 109,
        "totalSystemComplexity": 109,
        "package": "\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 1,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "HTML5_Parser",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "parse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "parseFragment",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "HTML5_Tokenizer",
            "HTML5_Tokenizer"
        ],
        "parents": [],
        "lcom": 2,
        "length": 20,
        "vocabulary": 6,
        "volume": 51.7,
        "difficulty": 4,
        "effort": 206.8,
        "level": 0.25,
        "bugs": 0.02,
        "time": 11,
        "intelligentContent": 12.92,
        "number_operators": 4,
        "number_operands": 16,
        "number_operators_unique": 2,
        "number_operands_unique": 4,
        "cloc": 16,
        "loc": 32,
        "lloc": 16,
        "mi": 106.06,
        "mIwoC": 61.6,
        "commentWeight": 44.46,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 1.13,
        "relativeSystemComplexity": 10.13,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 2.25,
        "totalSystemComplexity": 20.25,
        "package": "\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "HTML5_Tokenizer",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "parseFragment",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "parse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "save",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTree",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "stream",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "consumeCharacterReference",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "characterReferenceInAttributeValue",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "emitToken",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 9,
        "nbMethods": 7,
        "nbMethodsPrivate": 3,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 0,
        "wmc": 358,
        "ccn": 350,
        "ccnMethodMax": 286,
        "externals": [
            "HTML5_InputStream",
            "HTML5_TreeBuilder",
            "HTML5_Data",
            "HTML5_Data",
            "HTML5_Data",
            "HTML5_Data",
            "HTML5_Data"
        ],
        "parents": [],
        "lcom": 1,
        "length": 2817,
        "vocabulary": 222,
        "volume": 21956.87,
        "difficulty": 91.35,
        "effort": 2005754.62,
        "level": 0.01,
        "bugs": 7.32,
        "time": 111431,
        "intelligentContent": 240.36,
        "number_operators": 865,
        "number_operands": 1952,
        "number_operators_unique": 19,
        "number_operands_unique": 203,
        "cloc": 832,
        "loc": 1804,
        "lloc": 973,
        "mi": 43.42,
        "mIwoC": 0,
        "commentWeight": 43.42,
        "kanDefect": 6.83,
        "relativeStructuralComplexity": 144,
        "relativeDataComplexity": 0.92,
        "relativeSystemComplexity": 144.92,
        "totalStructuralComplexity": 1296,
        "totalDataComplexity": 8.31,
        "totalSystemComplexity": 1304.31,
        "package": "\\",
        "pageRank": 0.01,
        "afferentCoupling": 2,
        "efferentCoupling": 3,
        "instability": 0.6,
        "violations": {}
    },
    {
        "name": "HTML5_TreeBuilder",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "strConst",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getQuirksMode",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "emitToken",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "insertElement",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "insertText",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "insertComment",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "appendToRealParent",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "elementInScope",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reconstructActiveFormattingElements",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "clearTheActiveFormattingElementsUpToTheLastMarker",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "generateImpliedEndTags",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getElementCategory",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "clearStackToTableContext",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "resetInsertionMode",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "closeCell",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "processWithRulesFor",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "insertCDATAElement",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "insertRCDATAElement",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAttr",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCurrentTable",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFosterParent",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "fosterParent",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "printStack",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "printActiveFormattingElements",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "currentTableIsTainted",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setupContext",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "adjustMathMLAttributes",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "adjustSVGAttributes",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "adjustForeignAttributes",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "insertForeignElement",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "save",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 32,
        "nbMethods": 31,
        "nbMethodsPrivate": 21,
        "nbMethodsPublic": 10,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 796,
        "ccn": 765,
        "ccnMethodMax": 653,
        "externals": [
            "ReflectionClass",
            "DOMDocument",
            "DOMImplementation"
        ],
        "parents": [],
        "lcom": 2,
        "length": 4665,
        "vocabulary": 558,
        "volume": 42564.03,
        "difficulty": 60.77,
        "effort": 2586692.45,
        "level": 0.02,
        "bugs": 14.19,
        "time": 143705,
        "intelligentContent": 700.39,
        "number_operators": 1217,
        "number_operands": 3448,
        "number_operators_unique": 19,
        "number_operands_unique": 539,
        "cloc": 1214,
        "loc": 3049,
        "lloc": 1835,
        "mi": 41.46,
        "mIwoC": 0,
        "commentWeight": 41.46,
        "kanDefect": 23.21,
        "relativeStructuralComplexity": 1764,
        "relativeDataComplexity": 0.81,
        "relativeSystemComplexity": 1764.81,
        "totalStructuralComplexity": 56448,
        "totalDataComplexity": 25.93,
        "totalSystemComplexity": 56473.93,
        "package": "\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "Adobe_Font_Metrics",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "write",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addLine",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addPair",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addArray",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addMetric",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "startSection",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "endSection",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 8,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 8,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 40,
        "ccn": 33,
        "ccnMethodMax": 32,
        "externals": [
            "Font_TrueType",
            "Exception",
            "Encoding_Map"
        ],
        "parents": [],
        "lcom": 1,
        "length": 396,
        "vocabulary": 117,
        "volume": 2720.66,
        "difficulty": 12.4,
        "effort": 33746.22,
        "level": 0.08,
        "bugs": 0.91,
        "time": 1875,
        "intelligentContent": 219.34,
        "number_operators": 58,
        "number_operands": 338,
        "number_operators_unique": 8,
        "number_operands_unique": 109,
        "cloc": 8,
        "loc": 159,
        "lloc": 151,
        "mi": 41.01,
        "mIwoC": 23.98,
        "commentWeight": 17.03,
        "kanDefect": 2.88,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 0.15,
        "relativeSystemComplexity": 81.15,
        "totalStructuralComplexity": 648,
        "totalDataComplexity": 1.2,
        "totalSystemComplexity": 649.2,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "Encoding_Map",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "parse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [],
        "parents": [],
        "lcom": 1,
        "length": 34,
        "vocabulary": 19,
        "volume": 144.43,
        "difficulty": 5.54,
        "effort": 799.92,
        "level": 0.18,
        "bugs": 0.05,
        "time": 44,
        "intelligentContent": 26.08,
        "number_operators": 10,
        "number_operands": 24,
        "number_operators_unique": 6,
        "number_operands_unique": 13,
        "cloc": 12,
        "loc": 33,
        "lloc": 21,
        "mi": 95.84,
        "mIwoC": 55.63,
        "commentWeight": 40.21,
        "kanDefect": 0.45,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 1.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 3,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "Font",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "load",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "d",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "UTF16ToUTF8",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "UTF8ToUTF16",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 13,
        "ccn": 10,
        "ccnMethodMax": 9,
        "externals": [
            "class"
        ],
        "parents": [],
        "lcom": 4,
        "length": 71,
        "vocabulary": 34,
        "volume": 361.21,
        "difficulty": 5.36,
        "effort": 1935.05,
        "level": 0.19,
        "bugs": 0.12,
        "time": 108,
        "intelligentContent": 67.43,
        "number_operators": 21,
        "number_operands": 50,
        "number_operators_unique": 6,
        "number_operands_unique": 28,
        "cloc": 17,
        "loc": 69,
        "lloc": 52,
        "mi": 78.08,
        "mIwoC": 43.31,
        "commentWeight": 34.77,
        "kanDefect": 0.58,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 2.5,
        "relativeSystemComplexity": 3.5,
        "totalStructuralComplexity": 4,
        "totalDataComplexity": 10,
        "totalSystemComplexity": 14,
        "package": "php-font-lib\\",
        "pageRank": 0.03,
        "afferentCoupling": 7,
        "efferentCoupling": 1,
        "instability": 0.13,
        "violations": {}
    },
    {
        "name": "Font_Binary_Stream",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "load",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "open",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "close",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setFile",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTempFile",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "seek",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "pos",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "skip",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "read",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "write",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "readUInt8",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "writeUInt8",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "readInt8",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "writeInt8",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "readUInt16",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "writeUInt16",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "readInt16",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "writeInt16",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "readUInt32",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "writeUInt32",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "readFixed",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "writeFixed",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "readLongDateTime",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "writeLongDateTime",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "unpack",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "pack",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "r",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "w",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "convertUInt32ToStr",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 29,
        "nbMethods": 29,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 29,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 74,
        "ccn": 46,
        "ccnMethodMax": 17,
        "externals": [
            "Exception",
            "Exception"
        ],
        "parents": [],
        "lcom": 3,
        "length": 425,
        "vocabulary": 78,
        "volume": 2671.3,
        "difficulty": 49.83,
        "effort": 133104.23,
        "level": 0.02,
        "bugs": 0.89,
        "time": 7395,
        "intelligentContent": 53.61,
        "number_operators": 136,
        "number_operands": 289,
        "number_operators_unique": 20,
        "number_operands_unique": 58,
        "cloc": 72,
        "loc": 338,
        "lloc": 266,
        "mi": 49.7,
        "mIwoC": 16.92,
        "commentWeight": 32.78,
        "kanDefect": 2.03,
        "relativeStructuralComplexity": 361,
        "relativeDataComplexity": 2.89,
        "relativeSystemComplexity": 363.89,
        "totalStructuralComplexity": 10469,
        "totalDataComplexity": 83.85,
        "totalSystemComplexity": 10552.85,
        "package": "php-font-lib\\",
        "pageRank": 0.02,
        "afferentCoupling": 6,
        "efferentCoupling": 1,
        "instability": 0.14,
        "violations": {}
    },
    {
        "name": "Font_EOT",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "parseHeader",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "parse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "readUInt16",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "readUInt32",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Font_TrueType"
        ],
        "parents": [
            "Font_TrueType"
        ],
        "lcom": 2,
        "length": 51,
        "vocabulary": 37,
        "volume": 265.68,
        "difficulty": 1.94,
        "effort": 515.74,
        "level": 0.52,
        "bugs": 0.09,
        "time": 29,
        "intelligentContent": 136.87,
        "number_operators": 7,
        "number_operands": 44,
        "number_operators_unique": 3,
        "number_operands_unique": 34,
        "cloc": 5,
        "loc": 32,
        "lloc": 27,
        "mi": 80.41,
        "mIwoC": 51.67,
        "commentWeight": 28.74,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 0.67,
        "relativeSystemComplexity": 4.67,
        "totalStructuralComplexity": 16,
        "totalDataComplexity": 2.67,
        "totalSystemComplexity": 18.67,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_Header",
        "interface": false,
        "abstract": true,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "encode",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "parse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 3,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Font_Binary_Stream",
            "Font_TrueType"
        ],
        "parents": [
            "Font_Binary_Stream"
        ],
        "lcom": 1,
        "length": 12,
        "vocabulary": 4,
        "volume": 24,
        "difficulty": 4.5,
        "effort": 108,
        "level": 0.22,
        "bugs": 0.01,
        "time": 6,
        "intelligentContent": 5.33,
        "number_operators": 3,
        "number_operands": 9,
        "number_operators_unique": 2,
        "number_operands_unique": 2,
        "cloc": 15,
        "loc": 34,
        "lloc": 19,
        "mi": 105.15,
        "mIwoC": 62.31,
        "commentWeight": 42.84,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 0.44,
        "relativeSystemComplexity": 4.44,
        "totalStructuralComplexity": 12,
        "totalDataComplexity": 1.33,
        "totalSystemComplexity": 13.33,
        "package": "php-font-lib\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "Font_OpenType",
        "interface": false,
        "abstract": false,
        "methods": [],
        "nbMethodsIncludingGettersSetters": 0,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [
            "Font_TrueType"
        ],
        "parents": [
            "Font_TrueType"
        ],
        "lcom": 0,
        "length": 0,
        "vocabulary": 0,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 0,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 0,
        "number_operators_unique": 0,
        "number_operands_unique": 0,
        "cloc": 6,
        "loc": 10,
        "lloc": 4,
        "mi": 217.6,
        "mIwoC": 171,
        "commentWeight": 46.6,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 0,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 0,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_OpenType_Table_Directory_Entry",
        "interface": false,
        "abstract": false,
        "methods": [],
        "nbMethodsIncludingGettersSetters": 0,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [
            "Font_TrueType_Table_Directory_Entry"
        ],
        "parents": [
            "Font_TrueType_Table_Directory_Entry"
        ],
        "lcom": 0,
        "length": 0,
        "vocabulary": 0,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 0,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 0,
        "number_operators_unique": 0,
        "number_operands_unique": 0,
        "cloc": 5,
        "loc": 9,
        "lloc": 4,
        "mi": 216.73,
        "mIwoC": 171,
        "commentWeight": 45.73,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 0,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 0,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_Table",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFont",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_encode",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_parse",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_parseRaw",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_encodeRaw",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "encode",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "parse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 8,
        "nbMethodsPrivate": 4,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 13,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Font_Binary_Stream",
            "Font_Table_Directory_Entry",
            "Font"
        ],
        "parents": [
            "Font_Binary_Stream"
        ],
        "lcom": 1,
        "length": 49,
        "vocabulary": 9,
        "volume": 155.33,
        "difficulty": 13.6,
        "effort": 2112.44,
        "level": 0.07,
        "bugs": 0.05,
        "time": 117,
        "intelligentContent": 11.42,
        "number_operators": 15,
        "number_operands": 34,
        "number_operators_unique": 4,
        "number_operands_unique": 5,
        "cloc": 18,
        "loc": 75,
        "lloc": 57,
        "mi": 79.96,
        "mIwoC": 45.55,
        "commentWeight": 34.41,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 225,
        "relativeDataComplexity": 0.32,
        "relativeSystemComplexity": 225.32,
        "totalStructuralComplexity": 1800,
        "totalDataComplexity": 2.56,
        "totalSystemComplexity": 1802.56,
        "package": "php-font-lib\\",
        "pageRank": 0.02,
        "afferentCoupling": 12,
        "efferentCoupling": 3,
        "instability": 0.2,
        "violations": {}
    },
    {
        "name": "Font_Table_cmap",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "_parse",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_encode",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 17,
        "ccn": 16,
        "ccnMethodMax": 10,
        "externals": [
            "Font_Table"
        ],
        "parents": [
            "Font_Table"
        ],
        "lcom": 1,
        "length": 474,
        "vocabulary": 70,
        "volume": 2905.28,
        "difficulty": 55.97,
        "effort": 162613.46,
        "level": 0.02,
        "bugs": 0.97,
        "time": 9034,
        "intelligentContent": 51.91,
        "number_operators": 125,
        "number_operands": 349,
        "number_operators_unique": 17,
        "number_operands_unique": 53,
        "cloc": 21,
        "loc": 173,
        "lloc": 152,
        "mi": 51.7,
        "mIwoC": 26,
        "commentWeight": 25.7,
        "kanDefect": 1.95,
        "relativeStructuralComplexity": 121,
        "relativeDataComplexity": 0.08,
        "relativeSystemComplexity": 121.08,
        "totalStructuralComplexity": 242,
        "totalDataComplexity": 0.17,
        "totalSystemComplexity": 242.17,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_Table_Directory_Entry",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "computeChecksum",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "open",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTable",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "encode",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFont",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "startRead",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "endRead",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "startWrite",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "endWrite",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 10,
        "nbMethods": 9,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 9,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 12,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [
            "Font_Binary_Stream",
            "Font_TrueType",
            "Font_Table",
            "Font",
            "self",
            "Font"
        ],
        "parents": [
            "Font_Binary_Stream"
        ],
        "lcom": 5,
        "length": 149,
        "vocabulary": 40,
        "volume": 792.97,
        "difficulty": 22.71,
        "effort": 18011.69,
        "level": 0.04,
        "bugs": 0.26,
        "time": 1001,
        "intelligentContent": 34.91,
        "number_operators": 43,
        "number_operands": 106,
        "number_operators_unique": 12,
        "number_operands_unique": 28,
        "cloc": 25,
        "loc": 104,
        "lloc": 79,
        "mi": 72.33,
        "mIwoC": 37.9,
        "commentWeight": 34.43,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 64,
        "relativeDataComplexity": 0.29,
        "relativeSystemComplexity": 64.29,
        "totalStructuralComplexity": 640,
        "totalDataComplexity": 2.89,
        "totalSystemComplexity": 642.89,
        "package": "php-font-lib\\",
        "pageRank": 0.01,
        "afferentCoupling": 4,
        "efferentCoupling": 5,
        "instability": 0.56,
        "violations": {}
    },
    {
        "name": "Font_Table_glyf",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "getGlyphData",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_parse",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_encode",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 3,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 7,
        "ccn": 5,
        "ccnMethodMax": 4,
        "externals": [
            "Font_Table"
        ],
        "parents": [
            "Font_Table"
        ],
        "lcom": 1,
        "length": 122,
        "vocabulary": 33,
        "volume": 615.42,
        "difficulty": 10.33,
        "effort": 6359.3,
        "level": 0.1,
        "bugs": 0.21,
        "time": 353,
        "intelligentContent": 59.56,
        "number_operators": 29,
        "number_operands": 93,
        "number_operators_unique": 6,
        "number_operands_unique": 27,
        "cloc": 27,
        "loc": 83,
        "lloc": 56,
        "mi": 80.31,
        "mIwoC": 41.66,
        "commentWeight": 38.65,
        "kanDefect": 0.91,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 0.3,
        "relativeSystemComplexity": 81.3,
        "totalStructuralComplexity": 243,
        "totalDataComplexity": 0.9,
        "totalSystemComplexity": 243.9,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_Table_head",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "_parse",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Font_Table",
            "parent",
            "Exception"
        ],
        "parents": [
            "Font_Table"
        ],
        "lcom": 1,
        "length": 28,
        "vocabulary": 24,
        "volume": 128.38,
        "difficulty": 1.71,
        "effort": 220.08,
        "level": 0.58,
        "bugs": 0.04,
        "time": 12,
        "intelligentContent": 74.89,
        "number_operators": 4,
        "number_operands": 24,
        "number_operators_unique": 3,
        "number_operands_unique": 21,
        "cloc": 12,
        "loc": 24,
        "lloc": 12,
        "mi": 105.88,
        "mIwoC": 61.43,
        "commentWeight": 44.46,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 1,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 1,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_Table_hhea",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "_encode",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Font_Table",
            "parent"
        ],
        "parents": [
            "Font_Table"
        ],
        "lcom": 1,
        "length": 21,
        "vocabulary": 17,
        "volume": 85.84,
        "difficulty": 1.2,
        "effort": 103,
        "level": 0.83,
        "bugs": 0.03,
        "time": 6,
        "intelligentContent": 71.53,
        "number_operators": 3,
        "number_operands": 18,
        "number_operators_unique": 2,
        "number_operands_unique": 15,
        "cloc": 12,
        "loc": 23,
        "lloc": 11,
        "mi": 108.59,
        "mIwoC": 63.61,
        "commentWeight": 44.98,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.25,
        "relativeSystemComplexity": 9.25,
        "totalStructuralComplexity": 9,
        "totalDataComplexity": 0.25,
        "totalSystemComplexity": 9.25,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_Table_hmtx",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "_parse",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_encode",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 4,
        "ccnMethodMax": 3,
        "externals": [
            "Font_Table"
        ],
        "parents": [
            "Font_Table"
        ],
        "lcom": 1,
        "length": 82,
        "vocabulary": 22,
        "volume": 365.67,
        "difficulty": 11.06,
        "effort": 4045.26,
        "level": 0.09,
        "bugs": 0.12,
        "time": 225,
        "intelligentContent": 33.06,
        "number_operators": 23,
        "number_operands": 59,
        "number_operators_unique": 6,
        "number_operands_unique": 16,
        "cloc": 12,
        "loc": 47,
        "lloc": 35,
        "mi": 83.1,
        "mIwoC": 47.83,
        "commentWeight": 35.26,
        "kanDefect": 0.45,
        "relativeStructuralComplexity": 49,
        "relativeDataComplexity": 0.13,
        "relativeSystemComplexity": 49.13,
        "totalStructuralComplexity": 98,
        "totalDataComplexity": 0.25,
        "totalSystemComplexity": 98.25,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_Table_kern",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "_parse",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 6,
        "ccn": 6,
        "ccnMethodMax": 6,
        "externals": [
            "Font_Table"
        ],
        "parents": [
            "Font_Table"
        ],
        "lcom": 1,
        "length": 83,
        "vocabulary": 31,
        "volume": 411.2,
        "difficulty": 5.96,
        "effort": 2451.37,
        "level": 0.17,
        "bugs": 0.14,
        "time": 136,
        "intelligentContent": 68.98,
        "number_operators": 21,
        "number_operands": 62,
        "number_operators_unique": 5,
        "number_operands_unique": 26,
        "cloc": 14,
        "loc": 53,
        "lloc": 39,
        "mi": 81.92,
        "mIwoC": 46.18,
        "commentWeight": 35.74,
        "kanDefect": 0.37,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 25,
        "totalStructuralComplexity": 25,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 25,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_Table_loca",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "_parse",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_encode",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 9,
        "ccnMethodMax": 5,
        "externals": [
            "Font_Table"
        ],
        "parents": [
            "Font_Table"
        ],
        "lcom": 1,
        "length": 142,
        "vocabulary": 28,
        "volume": 682.64,
        "difficulty": 26.11,
        "effort": 17824.6,
        "level": 0.04,
        "bugs": 0.23,
        "time": 990,
        "intelligentContent": 26.14,
        "number_operators": 48,
        "number_operands": 94,
        "number_operators_unique": 10,
        "number_operands_unique": 18,
        "cloc": 14,
        "loc": 63,
        "lloc": 49,
        "mi": 75.43,
        "mIwoC": 42.07,
        "commentWeight": 33.35,
        "kanDefect": 0.43,
        "relativeStructuralComplexity": 49,
        "relativeDataComplexity": 0.13,
        "relativeSystemComplexity": 49.13,
        "totalStructuralComplexity": 98,
        "totalDataComplexity": 0.25,
        "totalSystemComplexity": 98.25,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_Table_maxp",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "_encode",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Font_Table",
            "parent"
        ],
        "parents": [
            "Font_Table"
        ],
        "lcom": 1,
        "length": 23,
        "vocabulary": 19,
        "volume": 97.7,
        "difficulty": 1.18,
        "effort": 114.94,
        "level": 0.85,
        "bugs": 0.03,
        "time": 6,
        "intelligentContent": 83.05,
        "number_operators": 3,
        "number_operands": 20,
        "number_operators_unique": 2,
        "number_operands_unique": 17,
        "cloc": 12,
        "loc": 23,
        "lloc": 11,
        "mi": 108.2,
        "mIwoC": 63.22,
        "commentWeight": 44.98,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.25,
        "relativeSystemComplexity": 9.25,
        "totalStructuralComplexity": 9,
        "totalDataComplexity": 0.25,
        "totalSystemComplexity": 9.25,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_Table_name",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "_parse",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_encode",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 6,
        "ccn": 5,
        "ccnMethodMax": 3,
        "externals": [
            "Font_Table",
            "Font_Table_name_Record",
            "Font"
        ],
        "parents": [
            "Font_Table"
        ],
        "lcom": 1,
        "length": 129,
        "vocabulary": 30,
        "volume": 632.99,
        "difficulty": 14,
        "effort": 8861.84,
        "level": 0.07,
        "bugs": 0.21,
        "time": 492,
        "intelligentContent": 45.21,
        "number_operators": 37,
        "number_operands": 92,
        "number_operators_unique": 7,
        "number_operands_unique": 23,
        "cloc": 6,
        "loc": 57,
        "lloc": 51,
        "mi": 66.55,
        "mIwoC": 42.46,
        "commentWeight": 24.09,
        "kanDefect": 0.84,
        "relativeStructuralComplexity": 100,
        "relativeDataComplexity": 0.09,
        "relativeSystemComplexity": 100.09,
        "totalStructuralComplexity": 200,
        "totalDataComplexity": 0.18,
        "totalSystemComplexity": 200.18,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_Table_name_Record",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "map",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUTF8",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUTF16",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__toString",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Font_Binary_Stream",
            "Font"
        ],
        "parents": [
            "Font_Binary_Stream"
        ],
        "lcom": 2,
        "length": 20,
        "vocabulary": 12,
        "volume": 71.7,
        "difficulty": 1.6,
        "effort": 114.72,
        "level": 0.63,
        "bugs": 0.02,
        "time": 6,
        "intelligentContent": 44.81,
        "number_operators": 4,
        "number_operands": 16,
        "number_operators_unique": 2,
        "number_operands_unique": 10,
        "cloc": 12,
        "loc": 42,
        "lloc": 30,
        "mi": 91.35,
        "mIwoC": 54.52,
        "commentWeight": 36.83,
        "kanDefect": 0.38,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1.63,
        "relativeSystemComplexity": 2.63,
        "totalStructuralComplexity": 4,
        "totalDataComplexity": 6.5,
        "totalSystemComplexity": 10.5,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "Font_Table_os2",
        "interface": false,
        "abstract": false,
        "methods": [],
        "nbMethodsIncludingGettersSetters": 0,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [
            "Font_Table"
        ],
        "parents": [
            "Font_Table"
        ],
        "lcom": 0,
        "length": 30,
        "vocabulary": 29,
        "volume": 145.74,
        "difficulty": 0,
        "effort": 0,
        "level": 1.93,
        "bugs": 0.05,
        "time": 0,
        "intelligentContent": 281.76,
        "number_operators": 0,
        "number_operands": 30,
        "number_operators_unique": 0,
        "number_operands_unique": 29,
        "cloc": 12,
        "loc": 17,
        "lloc": 5,
        "mi": 117.67,
        "mIwoC": 69.47,
        "commentWeight": 48.2,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 0,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 0,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_Table_post",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "_parse",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "_encode",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 19,
        "ccn": 18,
        "ccnMethodMax": 10,
        "externals": [
            "Font_Table"
        ],
        "parents": [
            "Font_Table"
        ],
        "lcom": 1,
        "length": 170,
        "vocabulary": 41,
        "volume": 910.78,
        "difficulty": 15.39,
        "effort": 14020.55,
        "level": 0.06,
        "bugs": 0.3,
        "time": 779,
        "intelligentContent": 59.17,
        "number_operators": 43,
        "number_operands": 127,
        "number_operators_unique": 8,
        "number_operands_unique": 33,
        "cloc": 20,
        "loc": 103,
        "lloc": 83,
        "mi": 66.54,
        "mIwoC": 34.99,
        "commentWeight": 31.54,
        "kanDefect": 1.58,
        "relativeStructuralComplexity": 100,
        "relativeDataComplexity": 0.18,
        "relativeSystemComplexity": 100.18,
        "totalStructuralComplexity": 200,
        "totalDataComplexity": 0.36,
        "totalSystemComplexity": 200.36,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_TrueType",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "getTable",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTableOffset",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "parse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "utf8toUnicode",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "lookupGlyph",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setSubset",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSubset",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "encode",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "parseHeader",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "parseTableEntries",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "normalizeFUnit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "readTable",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTableObject",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getData",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "saveAdobeFontMetrics",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reduce",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 16,
        "nbMethods": 15,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 14,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "wmc": 65,
        "ccn": 50,
        "ccnMethodMax": 14,
        "externals": [
            "Font_Binary_Stream",
            "Font",
            "Font",
            "Font_TrueType_Header",
            "class",
            "class",
            "Adobe_Font_Metrics"
        ],
        "parents": [
            "Font_Binary_Stream"
        ],
        "lcom": 2,
        "length": 968,
        "vocabulary": 457,
        "volume": 8553.3,
        "difficulty": 18.26,
        "effort": 156190.64,
        "level": 0.05,
        "bugs": 2.85,
        "time": 8677,
        "intelligentContent": 468.39,
        "number_operators": 170,
        "number_operands": 798,
        "number_operators_unique": 20,
        "number_operands_unique": 437,
        "cloc": 21,
        "loc": 316,
        "lloc": 295,
        "mi": 31.31,
        "mIwoC": 11.87,
        "commentWeight": 19.44,
        "kanDefect": 4.2,
        "relativeStructuralComplexity": 225,
        "relativeDataComplexity": 0.88,
        "relativeSystemComplexity": 225.88,
        "totalStructuralComplexity": 3600,
        "totalDataComplexity": 14.13,
        "totalSystemComplexity": 3614.13,
        "package": "php-font-lib\\",
        "pageRank": 0.02,
        "afferentCoupling": 8,
        "efferentCoupling": 5,
        "instability": 0.38,
        "violations": {}
    },
    {
        "name": "Font_TrueType_Collection",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "parse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFont",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "current",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "key",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "next",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "rewind",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "valid",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "count",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 7,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 7,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 12,
        "ccn": 5,
        "ccnMethodMax": 3,
        "externals": [
            "Font_Binary_Stream",
            "Iterator",
            "Countable",
            "OutOfBoundsException",
            "Font_TrueType"
        ],
        "parents": [
            "Font_Binary_Stream"
        ],
        "lcom": 1,
        "length": 66,
        "vocabulary": 12,
        "volume": 236.61,
        "difficulty": 15.71,
        "effort": 3718.12,
        "level": 0.06,
        "bugs": 0.08,
        "time": 207,
        "intelligentContent": 15.06,
        "number_operators": 22,
        "number_operands": 44,
        "number_operators_unique": 5,
        "number_operands_unique": 7,
        "cloc": 14,
        "loc": 75,
        "lloc": 61,
        "mi": 74.78,
        "mIwoC": 43.76,
        "commentWeight": 31.02,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 1.16,
        "relativeSystemComplexity": 37.16,
        "totalStructuralComplexity": 288,
        "totalDataComplexity": 9.29,
        "totalSystemComplexity": 297.29,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Font_TrueType_Header",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "parse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Font_Header",
            "parent"
        ],
        "parents": [
            "Font_Header"
        ],
        "lcom": 1,
        "length": 14,
        "vocabulary": 8,
        "volume": 42,
        "difficulty": 0.86,
        "effort": 36,
        "level": 1.17,
        "bugs": 0.01,
        "time": 2,
        "intelligentContent": 49,
        "number_operators": 2,
        "number_operands": 12,
        "number_operators_unique": 1,
        "number_operands_unique": 7,
        "cloc": 5,
        "loc": 16,
        "lloc": 11,
        "mi": 103.87,
        "mIwoC": 65.78,
        "commentWeight": 38.09,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 4,
        "totalStructuralComplexity": 4,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 4,
        "package": "php-font-lib\\",
        "pageRank": 0.01,
        "afferentCoupling": 2,
        "efferentCoupling": 2,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "Font_TrueType_Table_Directory_Entry",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Font_Table_Directory_Entry",
            "Font_TrueType",
            "parent"
        ],
        "parents": [
            "Font_Table_Directory_Entry"
        ],
        "lcom": 1,
        "length": 14,
        "vocabulary": 5,
        "volume": 32.51,
        "difficulty": 3.33,
        "effort": 108.36,
        "level": 0.3,
        "bugs": 0.01,
        "time": 6,
        "intelligentContent": 9.75,
        "number_operators": 4,
        "number_operands": 10,
        "number_operators_unique": 2,
        "number_operands_unique": 3,
        "cloc": 5,
        "loc": 17,
        "lloc": 12,
        "mi": 102.97,
        "mIwoC": 65.74,
        "commentWeight": 37.24,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 0.33,
        "relativeSystemComplexity": 4.33,
        "totalStructuralComplexity": 4,
        "totalDataComplexity": 0.33,
        "totalSystemComplexity": 4.33,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "Font_WOFF",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "parseHeader",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "load",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 4,
        "ccnMethodMax": 3,
        "externals": [
            "Font_TrueType",
            "Font_WOFF_Header",
            "parent",
            "Font_Table_Directory_Entry"
        ],
        "parents": [
            "Font_TrueType"
        ],
        "lcom": 1,
        "length": 101,
        "vocabulary": 19,
        "volume": 429.04,
        "difficulty": 21,
        "effort": 9009.85,
        "level": 0.05,
        "bugs": 0.14,
        "time": 501,
        "intelligentContent": 20.43,
        "number_operators": 29,
        "number_operands": 72,
        "number_operators_unique": 7,
        "number_operands_unique": 12,
        "cloc": 16,
        "loc": 63,
        "lloc": 47,
        "mi": 79.74,
        "mIwoC": 44.55,
        "commentWeight": 35.19,
        "kanDefect": 0.52,
        "relativeStructuralComplexity": 121,
        "relativeDataComplexity": 0.13,
        "relativeSystemComplexity": 121.13,
        "totalStructuralComplexity": 242,
        "totalDataComplexity": 0.25,
        "totalSystemComplexity": 242.25,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 4,
        "instability": 0.8,
        "violations": {}
    },
    {
        "name": "Font_WOFF_Header",
        "interface": false,
        "abstract": false,
        "methods": [],
        "nbMethodsIncludingGettersSetters": 0,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [
            "Font_TrueType_Header"
        ],
        "parents": [
            "Font_TrueType_Header"
        ],
        "lcom": 0,
        "length": 12,
        "vocabulary": 12,
        "volume": 43.02,
        "difficulty": 0,
        "effort": 0,
        "level": 2,
        "bugs": 0.01,
        "time": 0,
        "intelligentContent": 86.04,
        "number_operators": 0,
        "number_operands": 12,
        "number_operators_unique": 0,
        "number_operands_unique": 12,
        "cloc": 5,
        "loc": 10,
        "lloc": 5,
        "mi": 117.64,
        "mIwoC": 73.18,
        "commentWeight": 44.46,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 0,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 0,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 1,
        "efferentCoupling": 1,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "Font_WOFF_Table_Directory_Entry",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Font_Table_Directory_Entry",
            "Font_WOFF",
            "parent"
        ],
        "parents": [
            "Font_Table_Directory_Entry"
        ],
        "lcom": 1,
        "length": 14,
        "vocabulary": 3,
        "volume": 22.19,
        "difficulty": 2.5,
        "effort": 55.47,
        "level": 0.4,
        "bugs": 0.01,
        "time": 3,
        "intelligentContent": 8.88,
        "number_operators": 4,
        "number_operands": 10,
        "number_operators_unique": 1,
        "number_operands_unique": 2,
        "cloc": 5,
        "loc": 17,
        "lloc": 12,
        "mi": 104.14,
        "mIwoC": 66.9,
        "commentWeight": 37.24,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 0.33,
        "relativeSystemComplexity": 4.33,
        "totalStructuralComplexity": 4,
        "totalDataComplexity": 0.33,
        "totalSystemComplexity": 4.33,
        "package": "php-font-lib\\",
        "pageRank": 0,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    }
]