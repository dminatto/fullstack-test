define({ "api": [
  {
    "type": "post",
    "url": "v1/playlist",
    "title": "return a playlist match with weather",
    "name": "getSugestion",
    "group": "Music",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "temperature",
            "description": "<p>Temperature of city</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request-Example:",
          "content": "{\n     \"temperature\": \"31\"\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "Success",
            "description": "<p>Dados essenciais para atendimento</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Sucesso",
          "content": "{\n      \"name\": Dynamate,\n      \"artist\": BTS,\n      \"link\": \"https://open.spotify.com/track/0v1x6rN6JHRapa03JElljE\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "406": [
          {
            "group": "406",
            "optional": false,
            "field": "InvalidParameters",
            "description": "<p>parameter not found</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./routes/api.php",
    "groupTitle": "Music"
  },
  {
    "type": "post",
    "url": "v1/find-city",
    "title": "search term typed in the APP",
    "name": "findWeatherCity",
    "group": "Weather",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "term",
            "description": "<p>City name (or half)</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request-Example:",
          "content": "{\n     \"nameCity\": \"Crici\"\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "Success",
            "description": "<p>Dados essenciais para atendimento</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Sucesso",
          "content": "{\n      \"name\": Criciúma,\n      \"description\" : \"\"broken clouds\"\",\n      \"temperature\" : 27\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "404": [
          {
            "group": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>No cities found</p>"
          }
        ],
        "406": [
          {
            "group": "406",
            "optional": false,
            "field": "InvalidParameters",
            "description": "<p>Parameter not found</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./routes/api.php",
    "groupTitle": "Weather"
  }
] });
