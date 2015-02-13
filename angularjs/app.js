
(function () {
    var app = angular.module('speacial_character', []);

    app.controller('GreekController', function () {
        this.capital = greek_capital;
    });
})();

var greek_capital = [
    {"name": "Alpha", "number": "&#0391;"},
    {"name": "Beta", "number": "&#0392;"},
    {"name": "Gamma", "number": "&#0393;"},
    {"name": "Delta", "number": "&#0394;"},
    {"name": "Epsilon", "number": "&#0395;"},
    {"name": "Zeta", "number": "&#0396;"},
    {"name": "Eta", "number": "&#0397;"},
    {"name": "Theta", "number": "&#0398;"},
    {"name": "Iota", "number": "&#0399;"},
    {"name": "Kappa", "number": "&#039A;"},
    {"name": "Lambda", "number": "&#039B;"},
    {"name": "Mu", "number": "&#039C;"},
    {"name": "Nu", "number": "&#039D;"},
    {"name": "Xi", "number": "&#039E;"},
    {"name": "Omicron", "number": "&#03AF;"},
    {"name": "Pi", "number": "&#03A0;"},
    {"name": "Rho", "number": "&#03A1;"},
    {"name": "Sigma", "number": "&#03A3;"},
    {"name": "Tau", "number": "&#03A4;"},
    {"name": "Upsilon", "number": "&#03A5;"},
    {"name": "Phi", "number": "&#03A6;"},
    {"name": "Chi", "number": "&#03A7;"},
    {"name": "Psi", "number": "&#03A8;"},
    {"name": "Omega", "number": "&#03A9;"}
];