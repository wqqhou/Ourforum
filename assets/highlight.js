'use strict';

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }


var defaultOptions = {
  mods: ['hash', 'italic', 'bold', 'color']
};

// Not passing options.selector will result in highlighter binding to the entire document

var highlighter = function () {
  function highlighter(options) {
    _classCallCheck(this, highlighter);

    // Merge options
    var opts = Object.assign({}, defaultOptions, options);

    this.options = opts;
    this.IS_OPEN = false;
    this.OPENMOD = null;

    // Current active range
    this.activeRange;
    // Span wrapper
    this.wrapperNode;

    this.colorCircleNode;
    this.colorInputNode;
    this.hashInputNode;

    this.DEFAULT_STATE = {
      bold: false,
      italic: false,
      color: '#000000',
      hash: []
    };
    this.STATE = {
      bold: false,
      italic: false,
      color: '#000000',
      hash: []
    };

    this.render(this.options.mods);

    this.preventHighlighterPropagation(this.highlighterNode);
    this.bindModListeners(this.options.mods);
    this.bindListeners(this.options.selector);
  }

  highlighter.prototype.setState = function setState(state) {
    this.colorCircleNode.style.color = state.color;
    this.colorInputNode.style.value = state.color;
    this.hashInputNode.value = state.hash.join('');
  };

  highlighter.prototype.preventHighlighterPropagation = function preventHighlighterPropagation(hg) {
    hg.addEventListener('mousedown', function (event) {
      event.stopPropagation();
    });
    hg.addEventListener('mouseup', function (event) {
      event.stopPropagation();
    });
  };

  highlighter.prototype.getSelectionText = function getSelectionText() {
    var text = "";
    var selection = undefined;
    if (window.getSelection) {
      selection = window.getSelection();
      text = selection.toString();
    }
    return {
      text: text,
      selection: selection
    };
  };

  highlighter.prototype.getSelectionPosition = function getSelectionPosition(selection) {
    var range = selection.getRangeAt(0);
    this.activeRange = range;

    var position = range.getBoundingClientRect();
    var topScroll = window.pageYOffset || document.documentElement.scrollTop;
    var leftScroll = window.pageXOffset || document.documentElement.scrollLeft;
    return {
      start: range.startOffset,
      end: range.endOffset,
      x: position.left + position.width / 2 + leftScroll - 62.5,
      y: position.top + topScroll - 60
    };
  };

  highlighter.prototype.createSpanWrapper = function createSpanWrapper() {
    var _this = this;

    var span = document.createElement('span');
    span.className = "hgspan hgspan--selected";
    span.addEventListener('click', function (event) {
      _this.showHighlighter(event, true);
    });
    this.wrapperNode = span;
    return span;
  };

  highlighter.prototype.showHighlighter = function showHighlighter(event, fromExistingNode) {
    var _getSelectionText = this.getSelectionText();

    var text = _getSelectionText.text;
    var selection = _getSelectionText.selection;

    var _getSelectionPosition = this.getSelectionPosition(selection);

    var x = _getSelectionPosition.x;
    var y = _getSelectionPosition.y;

    // Exit if range has no selection

    if (this.activeRange.collapsed && !fromExistingNode) {
      return false;
    }

    this.highlighterNode = this.highlighterNode || document.getElementById('hg');
    this.selectionNode = event.target;
    this.STATE = JSON.parse(this.selectionNode.getAttribute('data-hg')) || Object.assign({}, this.DEFAULT_STATE);

    if (this.selectionNode.className !== "hgspan") {
      var newspan = this.createSpanWrapper();
      var _text = this.activeRange.extractContents();
      newspan.appendChild(_text);
      this.activeRange.insertNode(newspan);
    } else {
      this.wrapperNode = this.selectionNode;
    }
    if (fromExistingNode) {
      this.setState(this.STATE);
      this.activeRange.selectNode(event.target);
      this.selectionNode.className = 'hgspan hgspan--selected';
    }
    this.highlighterNode.classList.add('hg-wrp--open');
    this.highlighterNode.setAttribute('aria-hidden', false);
    this.highlighterNode.style.cssText = 'left:' + x + 'px;top:' + y + 'px';
  };

  highlighter.prototype.hideHighlighter = function hideHighlighter(event) {
    var isEqual = isEqualObject(this.STATE, this.DEFAULT_STATE);

    this.highlighterNode = this.highlighterNode || document.getElementById('hg');

    if (isEqual && !this.activeRange.collapsed) {
      this.activeRange.deleteContents();
      this.activeRange.insertNode(document.createTextNode(this.wrapperNode.innerHTML));
    } else {
      this.wrapperNode.className = "hgspan";
      this.wrapperNode.setAttribute('data-hg', JSON.stringify(this.STATE));
    }
    this.highlighterNode.setAttribute('aria-hidden', true);
    this.highlighterNode.className = "hg-wrp";
    this.setState(this.DEFAULT_STATE);
    this.OPENMOD = null;
  };

  highlighter.prototype.bindListeners = function bindListeners(selector) {
    var _this2 = this;

    if (selector) {
      var nodes = document.querySelectorAll(selector);
      if (!nodes) {
        throw new Error('Selector doesnt match any elements');
      }
      nodes.forEach(function (node) {
        node.addEventListener('mouseup', function (event) {
          _this2.showHighlighter(event);
        });
      });
    } else {
      document.addEventListener('mouseup', function (event) {
        _this2.showHighlighter(event);
      });
    }
    document.addEventListener('mousedown', function (event) {
      _this2.hideHighlighter(event);
    });
  };

  highlighter.prototype.bindModListeners = function bindModListeners(mods) {
    if (mods.indexOf('color') > -1) {
      this.bindColorMod();
    }
    if (mods.indexOf('hash') > -1) {
      this.bindHashMod();
    }
    if (mods.indexOf('bold') > -1) {
      this.bindBoldMod();
    }
    if (mods.indexOf('italic') > -1) {
      this.bindItalicMod();
    }
  };

  highlighter.prototype.setSelection = function setSelection() {
    var range = document.createRange();
    range.selectNodeContents(this.selectionNode);
    var sel = window.getSelection();
    sel.removeAllRanges();
    sel.addRange(range);
  };

  highlighter.prototype.bindColorMod = function bindColorMod() {
    var _this3 = this;

    this.highlighterNode = this.highlighterNode || document.getElementById('hg');
    this.colorInputNode = this.colorInputNode || this.highlighterNode.querySelector('input');
    this.colorCircleNode = this.colorCircleNode || this.highlighterNode.querySelector('.hg__option--color' + ' .hg-option--open');

    var openButton = this.highlighterNode.querySelector('.hg-option--open'),
        closeButton = this.highlighterNode.querySelector('.hg-option--close');

    openButton.addEventListener('click', function (event) {
      _this3.openColor(event, _this3.wrapperNode);
    });
    closeButton.addEventListener('click', this.closeColor);
  };

  highlighter.prototype.bindHashMod = function bindHashMod() {
    var _this4 = this;

    this.highlighterNode = this.highlighterNode || document.getElementById('hg');
    this.hashInputNode = this.hashInputNode || this.highlighterNode.querySelector('.hg-option--hash input');
    var openButton = this.highlighterNode.querySelector('.hg-option--openhash');

    openButton.addEventListener('click', function (event) {
      _this4.openHashMod(event);
    });
    this.hashInputNode.addEventListener('input', function (event) {
      _this4.setHash(event);
    });
  };

  highlighter.prototype.bindBoldMod = function bindBoldMod() {
    var _this5 = this;

    this.highlighterNode = this.highlighterNode || document.getElementById('hg');
    var boldButton = this.highlighterNode.querySelector('.hg-option--togglebold');
    boldButton.addEventListener('click', function (event) {
      _this5.addBold();
    });
  };

  highlighter.prototype.addBold = function addBold() {
    this.STATE.bold = !this.STATE.bold;
    this.wrapperNode.style.fontWeight = this.STATE.bold ? "bold" : null;
  };

  highlighter.prototype.bindItalicMod = function bindItalicMod() {
    var _this6 = this;

    this.highlighterNode = this.highlighterNode || document.getElementById('hg');
    var boldButton = this.highlighterNode.querySelector('.hg-option--toggleitalic');
    boldButton.addEventListener('click', function (event) {
      _this6.addItalic();
    });
  };

  highlighter.prototype.addItalic = function addItalic() {
    this.STATE.italic = !this.STATE.italic;
    this.wrapperNode.style.fontStyle = this.STATE.italic ? "italic" : null;
  };

  highlighter.prototype.openHashMod = function openHashMod(event) {
    this.highlighterNode = this.highlighterNode || document.getElementById('hg');
    if (this.OPENMOD === "HASH") {
      this.highlighterNode.classList.remove('hg-option--hash');
      this.highlighterNode.className = "hg-wrp hg-wrp--open hg-wrp--closefromhash";
      setTimeout(function () {
        hg.className = "hg-wrp hg-wrp--open";
      }, 500);
      this.OPENMOD = null;
    } else {
      this.highlighterNode.classList.add('hg-option--hash');
      this.OPENMOD = "HASH";
    }
  };

  highlighter.prototype.setHash = function setHash(event) {
    this.STATE.hash = event.target.value.replace(/\s+/, "").split(',');
  };

  highlighter.prototype.openColor = function openColor(event) {
    var _this7 = this;

    this.OPENMOD = "COLOR";
    this.highlighterNode = this.highlighterNode || document.getElementById('hg');
    this.highlighterNode.classList.add('hg-option--color');

    this.colorInputNode.addEventListener('input', function (event) {
      _this7.changeColor(event);
    });
  };

  highlighter.prototype.changeColor = function changeColor(event, circle) {
    var HexRex = /^#[0-9A-Fa-f]{6}/;
    var color = event.target.value;
    if (HexRex.test(color)) {
      this.colorCircleNode.style.color = color;
      this.wrapperNode.style.color = color;
      this.STATE.color = color;
    }
  };

  highlighter.prototype.closeColor = function closeColor(event) {
    var _this8 = this;

    this.highlighterNode = this.highlighterNode || document.getElementById('hg');
    this.OPENMOD = null;

    this.highlighterNode.className = "hg-wrp hg-wrp--open hg-wrp--closefromcolor";
    setTimeout(function () {
      _this8.highlighterNode.className = "hg-wrp hg-wrp--open";
    }, 500);
  };

  highlighter.prototype.render = function render(mods) {
    var template = '\n        <div class="hg-options">\n          ' + (mods.indexOf('color') > -1 ? '<div id="hgcolor" class="hg__option hg__option--color">\n              <button class="hg-option--close hg-options">OK</button>\n              <button class="hg-option hg-option--open">\n                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"\n                       id="Capa_1" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30"\n                       style="enable-background:new 0 0 15 15;" xml:space="preserve">\n                      <circle cx="12" cy="15" r="12" fill="currentColor"></circle>\n                  </svg>\n              </button>\n              <input type="text" value="#000000">\n          </div>' : "") + '\n          ' + (mods.indexOf('italic') > -1 ? '<div id="hgitalic" class="hg__option hg-option--italic">\n              <button class="hg-option hg-option--toggleitalic">\n                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="994.4px" height="994.4px" viewBox="0 0 994.4 994.4" style="enable-background:new 0 0 994.4 994.4;" xml:space="preserve">\n                      <path fill="currentColor"\n                          d="M524.65,766.3c2.3-7.699,4.6-15.6,6.6-23.6c0.301-1.3,35.101-135.6,72.301-275.8c64-241.1,79.6-289.6,83.1-297   c11.9-24.6,31.2-43.2,59-56.9c24-11.8,54.6-19.6,91-23.2c10.7-1.1,20.8-7,28.2-16.6c6.7-8.7,10.6-19.7,10.6-30.2   c0-23.7-19.3-43-43-43h-487.5c-23.7,0-43,19.3-43,43v1.5c0,21.2,15.2,39,36.101,42.4c27.699,4.5,65.699,10.7,95.5,24.8   c15.3,7.2,27.199,16,35.1,26c9,11.3,13.4,24.4,13.4,39.9c0,29-8.5,58.1-16.7,86.2c-1.7,5.9-3.5,12.1-5.2,18.1   c-10.5,37.5-26,94.4-43.9,160.3c-41.3,151.7-92.699,340.4-105.6,376.3c-8.7,24.2-41,81.5-152.1,90c-10.8,0.8-20.9,5.7-28.2,13.601   c-7.4,8-11.4,18.3-11.4,29.199v0.101c0,23.7,19.3,43,43,43h487.601c23.699,0,43-19.3,43-43v-0.3c0-21.7-16.2-40-37.7-42.601   c-4.2-0.5-8.3-1-12.7-1.5c-42.8-4.899-96-11.1-118.4-40.2c-10.399-13.5-13.699-31.3-10.3-54.199   C515.65,797.101,520.051,782.101,524.65,766.3z"/>\n                  </svg>\n              </button>\n          </div>' : "") + '\n          ' + (mods.indexOf('bold') > -1 ? '<div id="hgbold" class="hg__option hg-option--bold">\n              <button class="hg-option hg-option--togglebold">\n                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="438.543px" height="438.543px" viewBox="0 0 438.543 438.543" style="enable-background:new 0 0 438.543 438.543;" xml:space="preserve">\n                      <path fill="currentColor"\n                          d="M394.005,235.541c-17.131-19.987-42.537-33.878-76.231-41.683c23.612-10.85,37.887-18.177,42.835-21.982   c11.991-8.947,21.032-18.942,27.113-29.98c6.092-11.042,9.134-23.223,9.134-36.545c0-12.371-1.995-23.981-5.995-34.831   c-3.997-10.852-10.182-20.749-18.556-29.694c-8.565-8.943-18.273-16.18-29.122-21.7c-10.089-4.947-19.226-8.658-27.411-11.132   c-19.603-5.14-37.781-7.71-54.529-7.71h-21.128c-3.806,0-7.666-0.048-11.567-0.144C224.65,0.05,222.604,0,222.414,0   c-0.949,0-2.284,0.05-4.002,0.141c-1.713,0.096-3.049,0.144-3.999,0.144l-12.85,0.287L93.074,4.283l-74.23,1.714l1.142,23.695   c15.986,2.096,26.84,3.337,32.548,3.715c9.707,0.571,16.274,2.002,19.701,4.283c2.096,1.525,3.238,2.666,3.428,3.427   c1.902,4.187,2.946,14.56,3.14,31.121c0.76,28.171,1.619,66.619,2.568,115.344l0.571,141.896c0,24.359-0.855,42.828-2.568,55.388   c-0.761,4.569-2.762,9.422-5.997,14.562c-8.756,3.614-20.461,6.567-35.117,8.85c-4.375,0.568-10.848,1.711-19.412,3.43   l-0.571,26.836c45.489-1.526,71.374-2.57,77.663-3.142c40.729-2.478,69.093-3.521,85.08-3.142l56.242,1.137   c22.087,0.76,40.929-0.288,56.534-3.139c24.742-4.568,44.057-10.283,57.958-17.135c14.082-6.851,27.404-17.131,39.964-30.833   c9.527-10.466,16.275-21.601,20.272-33.407c5.521-16.174,8.278-31.494,8.278-45.963   C420.273,278.181,411.52,255.718,394.005,235.541z M170.456,33.126c14.846-2.474,27.218-3.711,37.115-3.711   c32.546,0,56.82,7.139,72.805,21.413c16.169,14.272,24.263,32.071,24.263,53.387c0,30.266-8.467,51.583-25.406,63.954   c-16.939,12.37-42.065,18.558-75.373,18.558c-12.562,0-22.935-0.665-31.118-1.997c-0.193-6.473-0.288-13.8-0.288-21.986   l0.288-27.979c0.188-29.88-0.383-56.431-1.714-79.656C170.646,48.829,170.456,41.506,170.456,33.126z M313.211,362.879   c-7.043,13.702-18.657,24.458-34.83,32.265c-16.181,7.806-36.74,11.703-61.671,11.703c-12.182,0-25.506-3.038-39.971-9.13   c-2.284-5.517-3.427-9.712-3.431-12.566l-0.854-77.088l0.288-49.392v-41.114c5.14-1.903,14.753-2.853,28.837-2.853   c31.787,0,55.291,3.046,70.519,9.135c15.797,6.096,29.218,18.086,40.258,35.978c7.803,12.566,11.704,29.694,11.704,51.394   C324.056,332.333,320.438,349.557,313.211,362.879z"/>\n                  </svg>\n              </button>\n          </div>' : "") + '\n          ' + (mods.indexOf('hash') > -1 ? '<div id="hghash" class="hg__option hg-option--hash">\n              <button class="hg-option hg-option--openhash">\n                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="457.03px" height="457.03px" viewBox="0 0 457.03 457.03" style="enable-background:new 0 0 457.03 457.03;" xml:space="preserve">\n                      <path fill="currentColor"\n                          d="M421.512,207.074l-85.795,85.767c-47.352,47.38-124.169,47.38-171.529,0c-7.46-7.439-13.296-15.821-18.421-24.465   l39.864-39.861c1.895-1.911,4.235-3.006,6.471-4.296c2.756,9.416,7.567,18.33,14.972,25.736c23.648,23.667,62.128,23.634,85.762,0   l85.768-85.765c23.666-23.664,23.666-62.135,0-85.781c-23.635-23.646-62.105-23.646-85.768,0l-30.499,30.532   c-24.75-9.637-51.415-12.228-77.373-8.424l64.991-64.989c47.38-47.371,124.177-47.371,171.557,0   C468.869,82.897,468.869,159.706,421.512,207.074z M194.708,348.104l-30.521,30.532c-23.646,23.634-62.128,23.634-85.778,0   c-23.648-23.667-23.648-62.138,0-85.795l85.778-85.767c23.665-23.662,62.121-23.662,85.767,0   c7.388,7.39,12.204,16.302,14.986,25.706c2.249-1.307,4.56-2.369,6.454-4.266l39.861-39.845   c-5.092-8.678-10.958-17.03-18.421-24.477c-47.348-47.371-124.172-47.371-171.543,0L35.526,249.96   c-47.366,47.385-47.366,124.172,0,171.553c47.371,47.356,124.177,47.356,171.547,0l65.008-65.003   C246.109,360.336,219.437,357.723,194.708,348.104z"/>\n                  </svg>\n              </button>\n              <input type="text" placeholder="URL Here (not implemented fully)">\n          </div>' : "") + '\n      </div>';

    var container = document.createElement('div');
    container.className = "hg-wrp";
    container.id = "hg";
    container.innerHTML = template;
    container.setAttribute('aria-hidden', true);
    document.body.appendChild(container);
    this.highlighterNode = document.getElementById('hg');
  };

  return highlighter;
}();

// utils

function isEqualObject() {
  var obj1 = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];
  var obj2 = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];

  var matches = true;
  Object.keys(obj1).forEach(function (key) {
    if (obj1.hasOwnProperty(key)) {
      if (typeof obj1[key] === "boolean" || typeof obj1[key] === "string") {
        if (obj1[key] !== obj2[key]) {
          matches = false;
        }
      } else if (obj1[key] instanceof Array) {
        if (obj1[key].length !== obj2[key].length) {
          matches = false;
        }
      }
    }
  });
  return matches;
}

var hg = new highlighter({
  selector: '#editorjs p'
});
