!function(){function a(){this._orig=this,this._ready=!1,this._queue=[],this._err=[]}function b(a,b){setTimeout(function(){a._resume()},b)}function c(a){a instanceof Function?a.apply(this):console.log(a)}function d(a){a instanceof Function?a.apply(this):console.log(a)}function e(a){this._break("closed"),a._resume()}function f(a){if(!a.length)return void this._break();var b=a.shift();if(a.length){var c=this;this._slip(d,[function(){f.apply(c,[a])}])}try{this._repair(),b.apply(this)}catch(e){this._break(e.toString())}}function g(a,b){for(var c in a)if(a[c]===b)return;a.push(b)}function h(a,b){for(var c in a)if(a[c]===b)return void a.splice(c,1)}function i(){a.apply(this)}function j(){i.prototype._time||(i.prototype._time=function(){return Date.now()}),i.prototype._startTime=i.prototype._time(),i.prototype.time=function(){return i.prototype._time()-i.prototype._startTime}}function k(a,b,c){if("undefined"==typeof b)return k(a,[],[]);if(a instanceof Object){for(var d=0;d<b.length;d++)if(b[d]===a)return c[d];var e;a instanceof Array?e=[]:(e={},b.push(a),c.push(e));for(var f in a)e[f]=k(a[f],b,c);return e}return a}function l(){this._info.engine=_._type,this._info.version=_._version,this._info.inputs=[],this._info.outputs=[],Y=[],Z=[],_._allOuts={},_._allIns={};var a,b;for(a=0;a<_._outs.length;a++)b=_._outs[a],b.engine=_,_._allOuts[b.name]=b,this._info.outputs.push({name:b.name,manufacturer:b.manufacturer,version:b.version,engine:_._type}),Y.push(b);for(a=0;a<aa._outs.length;a++)b=aa._outs[a],this._info.outputs.push({name:b.name,manufacturer:b.manufacturer,version:b.version,engine:b.type}),Y.push(b);for(a=0;a<_._ins.length;a++)b=_._ins[a],b.engine=_,_._allIns[b.name]=b,this._info.inputs.push({name:b.name,manufacturer:b.manufacturer,version:b.version,engine:_._type}),Z.push(b);for(a=0;a<aa._ins.length;a++)b=aa._ins[a],this._info.inputs.push({name:b.name,manufacturer:b.manufacturer,version:b.version,engine:b.type}),Z.push(b)}function m(){this._slip(l,[]),_._refresh()}function n(a,b){if("undefined"==typeof a)return b.slice();var c,d,e=[];if(a instanceof RegExp){for(d=0;d<b.length;d++)a.test(b[d].name)&&e.push(b[d]);return e}for(a instanceof Function&&(a=a(b)),a instanceof Array||(a=[a]),c=0;c<a.length;c++)for(d=0;d<b.length;d++)(a[c]+""==d+""||a[c]===b[d].name||a[c]instanceof Object&&a[c].name===b[d].name)&&e.push(b[d]);return e}function o(a,b){var c;c=b instanceof RegExp?"Port matching "+b+" not found":b instanceof Object||"undefined"==typeof b?"Port not found":'Port "'+b+'" not found',a._crash(c)}function p(a,b){function c(a){return function(){a.engine._openOut(this,a.name)}}var d=n(b,Y);if(!d.length)return void o(a,b);for(var e=0;e<d.length;e++)d[e]=c(d[e]);a._slip(f,[d]),a._resume()}function q(a,b){function c(a){return function(){a.engine._openIn(this,a.name)}}var d=n(b,Z);if(!d.length)return void o(a,b);for(var e=0;e<d.length;e++)d[e]=c(d[e]);a._slip(f,[d]),a._resume()}function r(){a.apply(this),this._handles=[],this._outs=[]}function s(a){this._receive(a)}function t(a){this._emit(a)}function u(a){a instanceof Function?g(this._orig._handles,a):g(this._orig._outs,a)}function v(a){a instanceof Function?h(this._orig._handles,a):h(this._orig._outs,a)}function w(){return"undefined"!=typeof module&&module.exports?void F(require("jazz-midi")):void this._break()}function x(){var a=document.createElement("div");a.style.visibility="hidden",document.body.appendChild(a);var b=document.createElement("object");return b.style.visibility="hidden",b.style.width="0px",b.style.height="0px",b.classid="CLSID:1ACE1618-1C7D-4561-AEE1-34842AA85E90",b.type="audio/x-jazz",document.body.appendChild(b),b.isJazz?void G(b):void this._break()}function y(){function a(a){H(a),c._resume()}function b(a){c._crash(a)}if(navigator.requestMIDIAccess){var c=this,d={};return this._options&&this._options.sysex===!0&&(d.sysex=!0),navigator.requestMIDIAccess(d).then(a,b),void this._pause()}this._break()}function z(){function a(e){if(b=!0,c||(c=document.getElementById("jazz-midi-msg")),c){var f=[];try{f=JSON.parse(c.innerText)}catch(e){}c.innerText="",document.removeEventListener("jazz-midi-msg",a),"version"===f[0]?(I(c,f[2]),d._resume()):d._crash()}}var b,c,d=this;this._pause(),document.addEventListener("jazz-midi-msg",a);try{document.dispatchEvent(new Event("jazz-midi"))}catch(e){}window.setTimeout(function(){b||d._crash()},0)}function A(){this._pause();var a=this;setTimeout(function(){a._crash()},0)}function B(a){if(!a||!a.engine)return[w,A,z,x,y,D];for(var b,c,d=a.engine instanceof Array?a.engine:[a.engine],e={},f=[],g=[],i={crx:z,plugin:x,webmidi:y},j=["crx","webmidi","plugin"],k=0;k<d.length;k++){var l=d[k].toString().toLowerCase();e[l]||(e[l]=!0,"none"===l&&(b=!0),"etc"===l&&(c=!0),i[l]&&(c?g.push(l):f.push(l),h(j,l)))}if((c||f.length||g.length)&&(b=!1),b)return[A,D];for(var m=[w,A],k=0;k<f.length;k++)m.push(i[f[k]]);if(c){for(var k=0;k<j.length;k++)m.push(i[j[k]]);for(var k=0;k<g.length;k++)m.push(i[g[k]])}return m.push(D),m}function C(a){$=new i,$._options=a,$._push(f,[B(a)]),$.refresh(),$._push(j,[]),$._push(function(){Y.length||Z.length||this._break()},[]),$._resume()}function D(){_._type="none",_._refresh=function(){_._outs=[],_._ins=[]}}function E(){_._inArr=[],_._outArr=[],_._inMap={},_._outMap={},_._version=_._main.version,_._refresh=function(){_._outs=[],_._ins=[];var a,b;for(a=0;(b=_._main.MidiOutInfo(a)).length;a++)_._outs.push({type:_._type,name:b[0],manufacturer:b[1],version:b[2]});for(a=0;(b=_._main.MidiInInfo(a)).length;a++)_._ins.push({type:_._type,name:b[0],manufacturer:b[1],version:b[2]})},_._openOut=function(a,b){var c=_._outMap[b];if(!c){_._pool.length<=_._outArr.length&&_._pool.push(_._newPlugin()),c={name:b,clients:[],info:{name:b,manufacturer:_._allOuts[b].manufacturer,version:_._allOuts[b].version,type:"MIDI-out",engine:_._type},_close:function(a){_._closeOut(a)},_receive:function(a){this.plugin.MidiOutRaw(a.slice())}};var d=_._pool[_._outArr.length];c.plugin=d,_._outArr.push(c),_._outMap[b]=c}if(!c.open){var e=c.plugin.MidiOutOpen(b);if(e!==b)return e&&c.plugin.MidiOutClose(),void a._break();c.open=!0}a._orig._impl=c,g(c.clients,a._orig),a._info=c.info,a._receive=function(a){c._receive(a)},a._close=function(){c._close(this)}},_._openIn=function(a,b){function c(a){return function(b,c){a.handle(b,c)}}var d=_._inMap[b];if(!d){_._pool.length<=_._inArr.length&&_._pool.push(_._newPlugin()),d={name:b,clients:[],info:{name:b,manufacturer:_._allIns[b].manufacturer,version:_._allIns[b].version,type:"MIDI-in",engine:_._type},_close:function(a){_._closeIn(a)},handle:function(a,b){for(var c in this.clients){var d=P(b);this.clients[c]._emit(d)}}};var e=_._pool[_._inArr.length];d.plugin=e,_._inArr.push(d),_._inMap[b]=d}if(!d.open){var f=e.MidiInOpen(b,c(d));if(f!==b)return f&&e.MidiInClose(),void a._break();d.open=!0}a._orig._impl=d,g(d.clients,a._orig),a._info=d.info,a._close=function(){d._close(this)}},_._closeOut=function(a){var b=a._impl;h(b.clients,a._orig),b.clients.length||(b.open=!1,b.plugin.MidiOutClose())},_._closeIn=function(a){var b=a._impl;h(b.clients,a._orig),b.clients.length||(b.open=!1,b.plugin.MidiInClose())},_._close=function(){for(var a in _._inArr)_._inArr[a].open&&_._inArr[a].plugin.MidiInClose()},i.prototype._time=function(){return _._main.Time()}}function F(a){_._type="node",_._main=a,_._pool=[],_._newPlugin=function(){return new a.MIDI},E()}function G(a){_._type="plugin",_._main=a,_._pool=[a],_._newPlugin=function(){var b=document.createElement("object");return b.style.visibility="hidden",b.style.width="0px",a.style.height="0px",b.classid="CLSID:1ACE1618-1C7D-4561-AEE1-34842AA85E90",b.type="audio/x-jazz",document.body.appendChild(b),b.isJazz?b:void 0},E()}function H(a){_._type="webmidi",_._version=43,_._access=a,_._inMap={},_._outMap={},_._refresh=function(){_._outs=[],_._ins=[],_._access.outputs.forEach(function(a,b){_._outs.push({type:_._type,name:a.name,manufacturer:a.manufacturer,version:a.version})}),_._access.inputs.forEach(function(a,b){_._ins.push({type:_._type,name:a.name,manufacturer:a.manufacturer,version:a.version})})},_._openOut=function(a,b){var c=_._outMap[b];if(!c){c={name:b,clients:[],info:{name:b,manufacturer:_._allOuts[b].manufacturer,version:_._allOuts[b].version,engine:_._type},_close:function(a){_._closeOut(a)},_receive:function(a){this.dev.send(a.slice())}};_._access.outputs.forEach(function(a,d){a.name===b&&(c.dev=a)}),c.dev?_._outMap[b]=c:c=void 0}c?(a._orig._impl=c,g(c.clients,a._orig),a._info=c.info,a._receive=function(a){c._receive(a)},a._close=function(){c._close(this)}):a._break()},_._openIn=function(a,b){function c(a){return function(b){a.handle(b)}}var d=_._inMap[b];if(!d){d={name:b,clients:[],info:{name:b,manufacturer:_._allIns[b].manufacturer,version:_._allIns[b].version,engine:_._type},_close:function(a){_._closeIn(a)},handle:function(a){for(var b in this.clients){var c=P([].slice.call(a.data));this.clients[b]._emit(c)}}};_._access.inputs.forEach(function(a,c){a.name===b&&(d.dev=a)}),d.dev?(d.dev.onmidimessage=c(d),_._inMap[b]=d):d=void 0}d?(a._orig._impl=d,g(d.clients,a._orig),a._info=d.info,a._close=function(){d._close(this)}):a._break()},_._closeOut=function(a){var b=a._impl;h(b.clients,a._orig)},_._closeIn=function(a){var b=a._impl;h(b.clients,a._orig)},_._close=function(){}}function I(a,b){_._type="crx",_._version=b,_._pool=[],_._inArr=[],_._outArr=[],_._inMap={},_._outMap={},_._msg=a,_._newPlugin=function(){var a={id:_._pool.length};a.id?document.dispatchEvent(new CustomEvent("jazz-midi",{detail:["new"]})):a.ready=!0,_._pool.push(a)},_._newPlugin(),_._refresh=function(){_._outs=[],_._ins=[],$._pause(),document.dispatchEvent(new CustomEvent("jazz-midi",{detail:["refresh"]}))},_._openOut=function(a,b){var c=_._outMap[b];if(!c){_._pool.length<=_._outArr.length&&_._newPlugin();var d=_._pool[_._outArr.length];c={name:b,clients:[],info:{name:b,manufacturer:_._allOuts[b].manufacturer,version:_._allOuts[b].version,type:"MIDI-out",engine:_._type},_start:function(){document.dispatchEvent(new CustomEvent("jazz-midi",{detail:["openout",d.id,b]}))},_close:function(a){_._closeOut(a)},_receive:function(a){var b=a.slice();b.splice(0,0,"play",d.id),document.dispatchEvent(new CustomEvent("jazz-midi",{detail:b}))}},c.plugin=d,d.output=c,_._outArr.push(c),_._outMap[b]=c,d.ready&&c._start()}a._orig._impl=c,g(c.clients,a._orig),a._info=c.info,a._receive=function(a){c._receive(a)},a._close=function(){c._close(this)},c.open||a._pause()},_._openIn=function(a,b){var c=_._inMap[b];if(!c){_._pool.length<=_._inArr.length&&_._newPlugin();var d=_._pool[_._inArr.length];c={name:b,clients:[],info:{name:b,manufacturer:_._allIns[b].manufacturer,version:_._allIns[b].version,type:"MIDI-in",engine:_._type},_start:function(){document.dispatchEvent(new CustomEvent("jazz-midi",{detail:["openin",d.id,b]}))},_close:function(a){_._closeIn(a)}},c.plugin=d,d.input=c,_._inArr.push(c),_._inMap[b]=c,d.ready&&c._start()}a._orig._impl=c,g(c.clients,a._orig),a._info=c.info,a._close=function(){c._close(this)},c.open||a._pause()},_._closeOut=function(a){var b=a._impl;h(b.clients,a._orig),b.clients.length||(b.open=!1,document.dispatchEvent(new CustomEvent("jazz-midi",{detail:["closeout",b.plugin.id]})))},_._closeIn=function(a){var b=a._impl;h(b.clients,a._orig),b.clients.length||(b.open=!1,document.dispatchEvent(new CustomEvent("jazz-midi",{detail:["closein",b.plugin.id]})))},_._close=function(){},document.addEventListener("jazz-midi-msg",function(a){var b=_._msg.innerText.split("\n");_._msg.innerText="";for(var c=0;c<b.length;c++){var d=[];try{d=JSON.parse(b[c])}catch(a){}if(d.length)if("refresh"===d[0]){if(d[1].ins){for(var e=0;c<d[1].ins;c++)d[1].ins[e].type=_._type;_._ins=d[1].ins}if(d[1].outs){for(var e=0;c<d[1].outs;c++)d[1].outs[e].type=_._type;_._outs=d[1].outs}$._resume()}else if("version"===d[0]){var f=_._pool[d[1]];f&&(f.ready=!0,f.input&&f.input._start(),f.output&&f.output._start())}else if("openout"===d[0]){var g=_._pool[d[1]].output;if(g&&(g.open=!0,g.clients))for(var c=0;c<g.clients.length;c++)g.clients[c]._resume()}else if("openin"===d[0]){var g=_._pool[d[1]].input;if(g&&(g.open=!0,g.clients))for(var c=0;c<g.clients.length;c++)g.clients[c]._resume()}else if("midi"===d[0]){var g=_._pool[d[1]].input;if(g&&g.clients)for(var c=0;c<g.clients.length;c++){var h=P(d.slice(3));g.clients[c]._emit(h)}}}})}function J(){var a=this instanceof J?this:a=new J;return J.prototype.reset.apply(a,arguments),a}function K(){29.97==this.type&&!this.second&&this.frame<2&&this.minute%10&&(this.frame=2)}function L(a){return[[24,25,29.97,30][a[7]>>1&3],(1&a[7])<<4|a[6],a[5]<<4|a[4],a[3]<<4|a[2],a[1]<<4|a[0]]}function M(a){!a.backwards&&a.quarter>=4?a.decrFrame():a.backwards&&a.quarter<4&&a.incrFrame();var b;switch(a.quarter>>1){case 0:b=a.frame;break;case 1:b=a.second;break;case 2:b=a.minute;break;default:b=a.hour}return 1&a.quarter?b>>=4:b&=15,7==a.quarter&&(25==a.type?b|=2:29.97==a.type?b|=4:30==a.type&&(b|=6)),!a.backwards&&a.quarter>=4?a.incrFrame():a.backwards&&a.quarter<4&&a.decrFrame(),b|a.quarter<<4}function N(a){return 25==a.type?32|a.hour:29.97==a.type?64|a.hour:30==a.type?96|a.hour:a.hour}function O(a){return a<10?"0"+a:a}function P(a){var b=this instanceof P?this:b=new P;if(b._from=a instanceof P?a._from.slice():[],!arguments.length)return b;for(var c=a instanceof Array?a:arguments,d=0;d<c.length;d++){var e=c[d];1==d&&b[0]>=128&&b[0]<=175&&(e=P.noteValue(e)),(e!=parseInt(e)||e<0||e>255)&&Q(c[d]),b.push(e)}return b}function Q(a){throw RangeError("Bad MIDI value: "+a)}function R(a){return(a!=parseInt(a)||a<0||a>15)&&Q(a),a}function S(a){return(a!=parseInt(a)||a<0||a>127)&&Q(a),a}function T(a){return(a!=parseInt(a)||a<0||a>16383)&&Q(a),127&a}function U(a){return(a!=parseInt(a)||a<0||a>16383)&&Q(a),a>>7}function V(a,b){P[a]=function(){return new P(b.apply(0,arguments))},r.prototype[a]=function(){return this.send(b.apply(0,arguments)),this}}function W(a){for(var b=[],c=0;c<a.length;c++)b[c]=(a[c]<16?"0":"")+a[c].toString(16);return b.join(" ")}var X="0.3.6";a.prototype._exec=function(){for(;this._ready&&this._queue.length;){var a=this._queue.shift();this._orig._bad?this._orig._hope&&a[0]==d?(this._orig._hope=!1,a[0].apply(this,a[1])):(this._queue=[],this._orig._hope=!1):a[0]!=d&&a[0].apply(this,a[1])}},a.prototype._push=function(b,c){this._queue.push([b,c]),a.prototype._exec.apply(this)},a.prototype._slip=function(a,b){this._queue.unshift([a,b])},a.prototype._pause=function(){this._ready=!1},a.prototype._resume=function(){this._ready=!0,a.prototype._exec.apply(this)},a.prototype._break=function(a){this._orig._bad=!0,this._orig._hope=!0,a&&this._orig._err.push(a)},a.prototype._repair=function(){this._orig._bad=!1},a.prototype._crash=function(a){this._break(a),this._resume()},a.prototype.err=function(){return k(this._err)},a.prototype.wait=function(a){function c(){}if(!a)return this;c.prototype=this._orig;var d=new c;return d._ready=!1,d._queue=[],this._push(b,[d,a]),d},a.prototype.and=function(a){return this._push(c,[a]),this},a.prototype.or=function(a){return this._push(d,[a]),this},a.prototype._info={},a.prototype.info=function(){return k(this._orig._info)},a.prototype.name=function(){return this.info().name},a.prototype.close=function(){var b=new a;return this._close&&this._push(this._close,[]),this._push(e,[b]),b},i.prototype=new a,i.prototype.time=function(){return 0},"undefined"!=typeof performance&&performance.now&&(i.prototype._time=function(){return performance.now()}),i.prototype._info={name:"JZZ.js",ver:X};var Y=[],Z=[];i.prototype.refresh=function(){return this._push(m,[]),this},i.prototype.openMidiOut=function(a){var b=new r;return this._push(m,[]),this._push(p,[b,a]),b},i.prototype.openMidiIn=function(a){var b=new r;return this._push(m,[]),this._push(q,[b,a]),b},i.prototype._close=function(){_._close()},r.prototype=new a,r.prototype._receive=function(a){this._emit(a)},r.prototype.send=function(){return this._push(s,[P.apply(null,arguments)]),this},r.prototype.note=function(a,b,c,d){return this.noteOn(a,b,c),d&&this.wait(d).noteOff(a,b),this},r.prototype._emit=function(a){for(var b in this._handles)this._handles[b].apply(this,[P(a)._stamp(this)]);for(var b in this._outs){var c=P(a);c._stamped(this._outs[b])||this._outs[b].send(c._stamp(this))}},r.prototype.emit=function(a){return this._push(t,[a]),this},r.prototype.connect=function(a){return this._push(u,[a]),this},r.prototype.disconnect=function(a){return this._push(v,[a]),this};var $,_={},aa={_outs:[],_ins:[]};JZZ=function(a){return $||C(a),$},JZZ.info=function(){return i.prototype.info()},JZZ.createNew=function(a){var b=new r;if(a instanceof Object)for(var c in a)b[c]=a[c];return b._resume(),b},i.prototype.createNew=JZZ.createNew,J.prototype.reset=function(a){if(a instanceof J)return this.setType(a.getType()),this.setHour(a.getHour()),this.setMinute(a.getMinute()),this.setSecond(a.getSecond()),this.setFrame(a.getFrame()),this.setQuarter(a.getQuarter()),this;var b=a instanceof Array?a:arguments;return this.setType(b[0]),this.setHour(b[1]),this.setMinute(b[2]),this.setSecond(b[3]),this.setFrame(b[4]),this.setQuarter(b[5]),this},J.prototype.isFullFrame=function(){return 0==this.quarter||4==this.quarter},J.prototype.getType=function(){return this.type},J.prototype.getHour=function(){return this.hour},J.prototype.getMinute=function(){return this.minute},J.prototype.getSecond=function(){return this.second},J.prototype.getFrame=function(){return this.frame},J.prototype.getQuarter=function(){return this.quarter},J.prototype.setType=function(a){if("undefined"==typeof a||24==a)this.type=24;else if(25==a)this.type=25;else if(29.97==a)this.type=29.97,K.apply(this);else{if(30!=a)throw RangeError("Bad SMPTE frame rate: "+a);this.type=30}return this.frame>=this.type&&(this.frame=29.97==this.type?29:this.type-1),this},J.prototype.setHour=function(a){if("undefined"==typeof a&&(a=0),a!=parseInt(a)||a<0||a>=24)throw RangeError("Bad SMPTE hours value: "+a);return this.hour=a,this},J.prototype.setMinute=function(a){if("undefined"==typeof a&&(a=0),a!=parseInt(a)||a<0||a>=60)throw RangeError("Bad SMPTE minutes value: "+a);return this.minute=a,K.apply(this),this},J.prototype.setSecond=function(a){if("undefined"==typeof a&&(a=0),a!=parseInt(a)||a<0||a>=60)throw RangeError("Bad SMPTE seconds value: "+a);return this.second=a,K.apply(this),this},J.prototype.setFrame=function(a){if("undefined"==typeof a&&(a=0),a!=parseInt(a)||a<0||a>=this.type)throw RangeError("Bad SMPTE frame number: "+a);return this.frame=a,K.apply(this),this},J.prototype.setQuarter=function(a){if("undefined"==typeof a&&(a=0),a!=parseInt(a)||a<0||a>=8)throw RangeError("Bad SMPTE quarter frame: "+a);return this.quarter=a,this},J.prototype.incrFrame=function(){return this.frame++,this.frame>=this.type&&(this.frame=0,this.second++,this.second>=60&&(this.second=0,this.minute++,this.minute>=60&&(this.minute=0,this.hour=this.hour>=23?0:this.hour+1))),K.apply(this),this},J.prototype.decrFrame=function(){return!this.second&&2==this.frame&&29.97==this.type&&this.minute%10&&(this.frame=0),this.frame--,this.frame<0&&(this.frame=29.97==this.type?29:this.type-1,this.second--,this.second<0&&(this.second=59,this.minute--,this.minute<0&&(this.minute=59,this.hour=this.hour?this.hour-1:23))),this},J.prototype.incrQF=function(){return this.backwards=!1,this.quarter=this.quarter+1&7,0!=this.quarter&&4!=this.quarter||this.incrFrame(),this},J.prototype.decrQF=function(){return this.backwards=!0,this.quarter=this.quarter+7&7,3!=this.quarter&&7!=this.quarter||this.decrFrame(),this},J.prototype.read=function(a){if(a instanceof P||(a=P.apply(null,arguments)),240==a[0]&&127==a[1]&&1==a[3]&&1==a[4]&&247==a[9])return this.type=[24,25,29.97,30][a[5]>>5&3],this.hour=31&a[5],this.minute=a[6],this.second=a[7],this.frame=a[8],this.quarter=0,this._=void 0,this._b=void 0,this._f=void 0,!0;if(241==a[0]&&"undefined"!=typeof a[1]){var b=a[1]>>4,c=15&a[1];return 0==b?7==this._&&(7==this._f&&(this.reset(L(this._a)),this.incrFrame()),this.incrFrame()):3==b?4==this._&&this.decrFrame():4==b?3==this._&&this.incrFrame():7==b&&0===this._&&(0===this._b&&(this.reset(L(this._a)),this.decrFrame()),this.decrFrame()),this._a||(this._a=[]),this._a[b]=c,this._f=this._f===b-1||0==b?b:void 0,this._b=this._b===b+1||7==b?b:void 0,this._=b,this.quarter=b,!0}return!1},J.prototype.toString=function(){return[O(this.hour),O(this.minute),O(this.second),O(this.frame)].join(":")},JZZ.SMPTE=J,P.prototype=[],P.prototype.constructor=P;var ba={};P.noteValue=function(a){return ba[a.toString().toLowerCase()]};var ca={c:0,d:2,e:4,f:5,g:7,a:9,b:11,h:11};for(var da in ca)for(var ea=0;ea<12;ea++){var fa=ca[da]+12*ea;if(fa>127)break;ba[da+ea]=fa,fa>0&&(ba[da+"b"+ea]=fa-1,ba[da+"bb"+ea]=fa-2),fa<127&&(ba[da+"#"+ea]=fa+1,ba[da+"##"+ea]=fa+2)}for(var ea=0;ea<128;ea++)ba[ea]=ea;var ga={noteOff:function(a,b){return[128+R(a),S(P.noteValue(b)),0]},noteOn:function(a,b,c){return[144+R(a),S(P.noteValue(b)),S(c)]},aftertouch:function(a,b,c){return[160+R(a),S(P.noteValue(b)),S(c)]},control:function(a,b,c){return[176+R(a),S(b),S(c)]},program:function(a,b){return[192+R(a),S(b)]},pressure:function(a,b){return[208+R(a),S(b)]},pitchBend:function(a,b){return[224+R(a),T(b),U(b)]},bankMSB:function(a,b){return[176+R(a),0,S(b)]},bankLSB:function(a,b){return[176+R(a),32,S(b)]},modMSB:function(a,b){return[176+R(a),1,S(b)]},modLSB:function(a,b){return[176+R(a),33,S(b)]},breathMSB:function(a,b){return[176+R(a),2,S(b)]},breathLSB:function(a,b){return[176+R(a),34,S(b)]},footMSB:function(a,b){return[176+R(a),4,S(b)]},footLSB:function(a,b){return[176+R(a),36,S(b)]},portamentoMSB:function(a,b){return[176+R(a),5,S(b)]},portamentoLSB:function(a,b){return[176+R(a),37,S(b)]},volumeMSB:function(a,b){return[176+R(a),7,S(b)]},volumeLSB:function(a,b){return[176+R(a),39,S(b)]},balanceMSB:function(a,b){return[176+R(a),8,S(b)]},balanceLSB:function(a,b){return[176+R(a),40,S(b)]},panMSB:function(a,b){return[176+R(a),10,S(b)]},panLSB:function(a,b){return[176+R(a),42,S(b)]},expressionMSB:function(a,b){return[176+R(a),11,S(b)]},expressionLSB:function(a,b){return[176+R(a),43,S(b)]},damper:function(a,b){return[176+R(a),64,b?127:0]},portamento:function(a,b){return[176+R(a),65,b?127:0]},sostenuto:function(a,b){return[176+R(a),66,b?127:0]},soft:function(a,b){return[176+R(a),67,b?127:0]},allSoundOff:function(a){return[176+R(a),120,0]},allNotesOff:function(a){return[176+R(a),123,0]},mtc:function(a){return[241,M(a)]},songPosition:function(a){return[242,T(a),U(a)]},songSelect:function(a){return[243,S(a)]},tune:function(){return[246]},clock:function(){return[248]},start:function(){return[250]},"continue":function(){return[251]},stop:function(){return[252]},active:function(){return[254]},sxIdRequest:function(){return[240,126,127,6,1,247]},sxFullFrame:function(a){return[240,127,127,1,1,N(a),a.getMinute(),a.getSecond(),a.getFrame(),247]},reset:function(){return[255]}};for(var da in ga)V(da,ga[da]);for(var ha={a:10,b:11,c:12,d:13,e:14,f:15,A:10,B:11,C:12,D:13,E:14,F:15},da=0;da<16;da++)ha[da]=da;P.prototype.getChannel=function(){var a=this[0];if(!("undefined"==typeof a||a<128||a>239))return 15&a},P.prototype.setChannel=function(a){var b=this[0];return"undefined"==typeof b||b<128||b>239?this:(a=ha[a],"undefined"!=typeof a&&(this[0]=240&b|a),this)},P.prototype.getNote=function(){var a=this[0];if(!("undefined"==typeof a||a<128||a>175))return this[1]},P.prototype.setNote=function(a){var b=this[0];return"undefined"==typeof b||b<128||b>175?this:(a=P.noteValue(a),"undefined"!=typeof a&&(this[1]=a),this)},P.prototype.getVelocity=function(){var a=this[0];if(!("undefined"==typeof a||a<144||a>159))return this[2]},P.prototype.setVelocity=function(a){var b=this[0];return"undefined"==typeof b||b<144||b>159?this:(a=parseInt(a),a>=0&&a<128&&(this[2]=a),this)},P.prototype.getSysExChannel=function(){if(240==this[0])return this[2]},P.prototype.setSysExChannel=function(a){return 240==this[0]&&this.length>2&&(a=parseInt(a),a>=0&&a<128&&(this[2]=a)),this},P.prototype.isNoteOn=function(){var a=this[0];return!("undefined"==typeof a||a<144||a>159)&&this[2]>0},P.prototype.isNoteOff=function(){var a=this[0];return!("undefined"==typeof a||a<128||a>159)&&(a<144||0==this[2])},P.prototype.isSysEx=function(){return 240==this[0]},P.prototype.isFullSysEx=function(){return 240==this[0]&&247==this[this.length-1]},P.prototype.toString=function(){if(!this.length)return"empty";var a=W(this);if(this[0]<128)return a;var b={241:"MIDI Time Code",242:"Song Position",243:"Song Select",244:"Undefined",245:"Undefined",246:"Tune request",248:"Timing clock",249:"Undefined",250:"Start",251:"Continue",252:"Stop",253:"Undefined",254:"Active Sensing",255:"Reset"}[this[0]];if(b)return a+" -- "+b;var c=this[0]>>4;return(b={8:"Note Off",10:"Aftertouch",12:"Program Change",13:"Channel Aftertouch",14:"Pitch Wheel"}[c])?a+" -- "+b:9==c?a+" -- "+(this[2]?"Note On":"Note Off"):11!=c?a:(b={0:"Bank Select MSB",1:"Modulation Wheel MSB",2:"Breath Controller MSB",4:"Foot Controller MSB",5:"Portamento Time MSB",6:"Data Entry MSB",7:"Channel Volume MSB",8:"Balance MSB",10:"Pan MSB",11:"Expression Controller MSB",12:"Effect Control 1 MSB",13:"Effect Control 2 MSB",16:"General Purpose Controller 1 MSB",17:"General Purpose Controller 2 MSB",18:"General Purpose Controller 3 MSB",19:"General Purpose Controller 4 MSB",32:"Bank Select LSB",33:"Modulation Wheel LSB",34:"Breath Controller LSB",36:"Foot Controller LSB",37:"Portamento Time LSB",38:"Data Entry LSB",39:"Channel Volume LSB",40:"Balance LSB",42:"Pan LSB",43:"Expression Controller LSB",44:"Effect control 1 LSB",45:"Effect control 2 LSB",48:"General Purpose Controller 1 LSB",49:"General Purpose Controller 2 LSB",50:"General Purpose Controller 3 LSB",51:"General Purpose Controller 4 LSB",64:"Damper Pedal On/Off",65:"Portamento On/Off",66:"Sostenuto On/Off",67:"Soft Pedal On/Off",68:"Legato Footswitch",69:"Hold 2",70:"Sound Controller 1",71:"Sound Controller 2",72:"Sound Controller 3",73:"Sound Controller 4",74:"Sound Controller 5",75:"Sound Controller 6",76:"Sound Controller 7",77:"Sound Controller 8",78:"Sound Controller 9",79:"Sound Controller 10",80:"General Purpose Controller 5",81:"General Purpose Controller 6",82:"General Purpose Controller 7",83:"General Purpose Controller 8",84:"Portamento Control",88:"High Resolution Velocity Prefix",91:"Effects 1 Depth",92:"Effects 2 Depth",93:"Effects 3 Depth",94:"Effects 4 Depth",95:"Effects 5 Depth",96:"Data Increment",97:"Data Decrement",98:"Non-Registered Parameter Number LSB",99:"Non-Registered Parameter Number MSB",100:"Registered Parameter Number LSB",101:"Registered Parameter Number MSB",120:"All Sound Off",121:"Reset All Controllers",122:"Local Control On/Off",123:"All Notes Off",124:"Omni Mode Off",125:"Omni Mode On",126:"Mono Mode On",127:"Poly Mode On"}[this[1]],b||(b="Undefined"),a+" -- "+b)},P.prototype._stamp=function(a){return this._from.push(a._orig?a._orig:a),this},P.prototype._unstamp=function(a){if("undefined"==typeof a)this._from=[];else{a._orig&&(a=a._orig);var b=this._from.indexOf(a);b>-1&&this._from.splice(b,1)}return this},P.prototype._stamped=function(a){a._orig&&(a=a._orig);for(var b=0;b<this._from.length;b++)if(this._from[b]==a)return!0;return!1},JZZ.MIDI=P,JZZ.lib={},JZZ.lib.openMidiOut=function(a,b){var c=new r;return b._openOut(c,a),c},JZZ.lib.openMidiIn=function(a,b){var c=new r;return b._openIn(c,a),c},JZZ.lib.registerMidiOut=function(a,b){var c=b._info(a);for(var d in aa._outs)if(aa._outs[d].name==c.name)return!1;return c.engine=b,aa._outs.push(c),$&&$._bad&&($._repair(),$._resume()),!0},JZZ.lib.registerMidiIn=function(a,b){var c=b._info(a);for(var d in aa._ins)if(aa._ins[d].name==c.name)return!1;return c.engine=b,aa._ins.push(c),$&&$._bad&&($._repair(),$._resume()),!0},JZZ.util={},JZZ.util.iosSound=function(){if(JZZ.util.iosSound=function(){},window){var a=window.AudioContext||window.webkitAudioContext;if(a){var b=new a;b.createGain||(b.createGain=b.createGainNode);var c=b.createOscillator(),d=b.createGain();d.gain.value=0,c.connect(d),d.connect(b.destination),c.start||(c.start=c.noteOn),c.stop||(c.stop=c.noteOff),c.start(0),c.stop(1)}}}}();