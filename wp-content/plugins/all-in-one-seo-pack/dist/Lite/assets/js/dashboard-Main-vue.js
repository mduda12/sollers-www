(window["aioseopjsonp"]=window["aioseopjsonp"]||[]).push([["dashboard-Main-vue"],{"145f":function(t,s,i){"use strict";i("a718")},a718:function(t,s,i){},c1f4:function(t,s,i){"use strict";i.r(s);var e=function(){var t=this,s=t.$createElement,i=t._self._c||s;return i("div",{staticClass:"aioseo-dashboard"},[i("core-main",{attrs:{"page-name":t.strings.pageName,"show-tabs":!1,"show-save-button":!1}},[i("div",[t.settings.showSetupWizard?i("div",{staticClass:"dashboard-getting-started"},[i("core-getting-started")],1):t._e(),i("grid-row",[i("grid-column",{attrs:{md:"6"}},[i("core-card",{attrs:{slug:"dashboardSeoSiteScore","header-text":t.strings.seoSiteScore}},[i("core-seo-site-score")],1),i("grid-row",[i("grid-column",[i("div",{staticClass:"aioseo-quicklinks-title"},[t._v(" "+t._s(t.strings.quicklinks)+" "),i("core-tooltip",{scopedSlots:t._u([{key:"tooltip",fn:function(){return[t._v(" "+t._s(t.strings.quicklinksTooltip)+" ")]},proxy:!0}])},[i("svg-circle-question-mark")],1)],1)]),t._l(t.quickLinks,(function(s,e){return i("grid-column",{key:e,staticClass:"aioseo-quicklinks-cards",attrs:{lg:"6"}},[i("core-feature-card",{attrs:{feature:s,"can-activate":!1,"static-card":""},scopedSlots:t._u([{key:"title",fn:function(){return[i(s.icon,{tag:"component"}),t._v(" "+t._s(s.name)+" ")]},proxy:!0},{key:"description",fn:function(){return[t._v(" "+t._s(s.description)+" ")]},proxy:!0}],null,!0)})],1)}))],2)],1),i("grid-column",{attrs:{md:"6"}},[i("core-card",{staticClass:"dashboard-notifications",attrs:{slug:"dashboardNotifications"},scopedSlots:t._u([{key:"header",fn:function(){return[t.notificationsCount?i("div",{staticClass:"notifications-count"},[t._v(" ("+t._s(t.notificationsCount)+") ")]):t._e(),i("div",[t._v(t._s(t.notificationTitle))]),t.dismissed?i("a",{staticClass:"show-dismissed-notifications",attrs:{href:"#"},on:{click:function(s){s.preventDefault(),t.dismissed=!1}}},[t._v(t._s(t.strings.activeNotifications))]):t._e()]},proxy:!0}])},[i("core-notification-cards",{attrs:{notifications:t.filteredNotifications,dismissedCount:t.dismissedNotificationsCount},on:{"toggle-dismissed":function(s){t.dismissed=!t.dismissed}},scopedSlots:t._u([{key:"no-notifications",fn:function(){return[i("div",{staticClass:"no-dashboard-notifications"},[i("div",[t._v(" "+t._s(t.strings.noNewNotificationsThisMoment)+" ")]),t.dismissedNotificationsCount?i("a",{attrs:{href:"#"},on:{click:function(s){s.preventDefault(),t.dismissed=!0}}},[t._v(t._s(t.strings.seeAllDismissedNotifications))]):t._e()])]},proxy:!0}])}),t.filteredNotifications.length&&(!t.dismissed||3<t.filteredNotifications.length)?i("div",{staticClass:"notification-footer"},[i("div",{staticClass:"more-notifications"},[t.notifications.length>t.visibleNotifications?[i("a",{attrs:{href:"#"},on:{click:function(s){return s.stopPropagation(),s.preventDefault(),t.toggleNotifications(s)}}},[t._v(t._s(t.moreNotifications))]),i("a",{staticClass:"no-underline",attrs:{href:"#"},on:{click:function(s){return s.stopPropagation(),s.preventDefault(),t.toggleNotifications(s)}}},[t._v("→")])]:t._e()],2),t.dismissed?t._e():i("div",{staticClass:"dismiss-all"},[t.notifications.length?i("a",{staticClass:"dismiss",attrs:{href:"#"},on:{click:function(s){return s.stopPropagation(),s.preventDefault(),t.processDismissAllNotifications(s)}}},[t._v(t._s(t.strings.dismissAll))]):t._e()])]):t._e()],1),i("core-card",{staticClass:"dashboard-support",attrs:{slug:"dashboardSupport","header-text":t.strings.support}},t._l(t.supportOptions,(function(s,e){return i("div",{key:e,staticClass:"aioseo-settings-row"},[i("a",{attrs:{href:s.link,target:s.blank?"_blank":null}},[i(s.icon,{tag:"component"}),t._v(" "+t._s(s.text)+" ")],1)])})),0),t.isUnlicensed?i("cta",{staticClass:"dashboard-cta",attrs:{type:3,floating:!1,"cta-link":t.$links.utmUrl("dashboard-cta"),"feature-list":[t.strings.smartSchema,t.strings.localSeo,t.strings.advancedSupportForEcommerce,t.strings.advancedGATracking,t.strings.videoSeoModule,t.strings.greaterControlOverDisplay,t.strings.seoForCats,t.strings.socialMetaCats,t.strings.adFree],"button-text":t.strings.ctaButton,"learn-more-link":t.$links.getUpsellUrl("dashboard-cta",null,"home")},scopedSlots:t._u([{key:"header-text",fn:function(){return[t._v(" "+t._s(t.strings.ctaHeaderText)+" ")]},proxy:!0}],null,!1,2059824803)}):t._e()],1)],1)],1)])],1)},o=[],a=i("2909"),n=i("5530"),r=(i("a434"),i("99af"),i("159b"),i("9c0e")),c=i("2f62"),d={mixins:[r["i"]],data:function(){return{dismissed:!1,visibleNotifications:3,strings:{smartSchema:this.$t.__("Smart Schema",this.$td),localSeo:this.$t.__("Local SEO",this.$td),advancedSupportForEcommerce:this.$t.__("Advanced support for e-commerce",this.$td),advancedGATracking:this.$t.__("Advanced Google Analytics tracking",this.$td),videoSeoModule:this.$t.__("Video SEO Module",this.$td),greaterControlOverDisplay:this.$t.__("Greater control over display settings",this.$td),seoForCats:this.$t.__("SEO for Categories, Tags and Custom Taxonomies",this.$td),socialMetaCats:this.$t.__("Social meta for Categories, Tags and Custom Taxonomies",this.$td),adFree:this.$t.__("Ad free (no banner adverts)",this.$td),pageName:this.$t.__("Dashboard",this.$td),noNewNotificationsThisMoment:this.$t.__("There are no new notifications at this moment.",this.$td),seeAllDismissedNotifications:this.$t.__("See all dismissed notifications.",this.$td),seoSiteScore:this.$t.__("SEO Site Score",this.$td),support:this.$t.__("Support",this.$td),readSeoUserGuide:this.$t.sprintf(this.$t.__("Read the %1$s user guide",this.$td),"All in One SEO"),accessPremiumSupport:this.$t.__("Access our Premium Support",this.$td),viewChangelog:this.$t.__("View the Changelog",this.$td),watchVideoTutorials:this.$t.__("Watch video tutorials",this.$td),gettingStarted:this.$t.__("Getting started? Read the Beginners Guide",this.$td),quicklinks:this.$t.__("Quicklinks",this.$td),quicklinksTooltip:this.$t.__("You can use these quicklinks to quickly access our settings pages to adjust your site's SEO settings.",this.$td),searchAppearance:this.$t.__("Search Appearance",this.$td),manageSearchAppearance:this.$t.__("Configure how your website content will look in Google, Bing and other search engines.",this.$td),seoAnalysis:this.$t.__("SEO Analysis",this.$td),manageSeoAnalysis:this.$t.__("Check how your site scores with our SEO analyzer and compare against your competitor's site.",this.$td),manageLocalSeo:this.$t.__("Improve local SEO rankings with schema for business address, open hours, contact, and more.",this.$td),socialNetworks:this.$t.__("Social Networks",this.$td),manageSocialNetworks:this.$t.__("Setup Open Graph for Facebook, Twitter, etc. to show the right content / thumbnail preview.",this.$td),tools:this.$t.__("Tools",this.$td),manageTools:this.$t.__("Fine-tune your site with our powerful tools including Robots.txt editor, import/export and more.",this.$td),sitemap:this.$t.__("Sitemaps",this.$td),manageSitemap:this.$t.__("Manage all of your sitemap settings, including XML, Video, News and more.",this.$td),ctaHeaderText:this.$t.sprintf(this.$t.__("Get more features in %1$s %2$s:",this.$td),"AIOSEO","Pro"),ctaButton:this.$t.sprintf(this.$t.__("Upgrade to %1$s and Save %2$s",this.$td),"Pro","50%"),dismissAll:this.$t.__("Dismiss All",this.$td),relaunchSetupWizard:this.$t.__("Relaunch Setup Wizard",this.$td)}}},computed:Object(n["a"])(Object(n["a"])(Object(n["a"])({},Object(c["c"])(["isUnlicensed"])),Object(c["e"])(["settings"])),{},{moreNotifications:function(){return this.$t.sprintf(this.$t.__("You have %1$s more notifications",this.$td),this.remainingNotificationsCount)},remainingNotificationsCount:function(){return this.notifications.length-this.visibleNotifications},filteredNotifications:function(){var t=Object(a["a"])(this.notifications);return t.splice(0,this.visibleNotifications)},supportOptions:function(){var t=[{icon:"svg-book",text:this.strings.readSeoUserGuide,link:this.$links.utmUrl("dashboard-support-box","user-guide","doc-categories/getting-started/"),blank:!0},{icon:"svg-message",text:this.strings.accessPremiumSupport,link:this.$links.utmUrl("dashboard-support-box","premium-support","contact/"),blank:!0},{icon:"svg-history",text:this.strings.viewChangelog,link:this.$links.utmUrl("dashboard-support-box","changelog","changelog/"),blank:!0},{icon:"svg-book",text:this.strings.gettingStarted,link:this.$links.utmUrl("dashboard-support-box","beginners-guide","docs/quick-start-guide/"),blank:!0}];return this.settings.showSetupWizard?t:t.concat({icon:"svg-rocket",text:this.strings.relaunchSetupWizard,link:this.$aioseo.urls.aio.wizard,blank:!1})},quickLinks:function(){return[{icon:"svg-title-and-meta",description:this.strings.manageSearchAppearance,name:this.strings.searchAppearance,manageUrl:this.$aioseo.urls.aio.searchAppearance},{icon:"svg-clipboard-checkmark",description:this.strings.manageSeoAnalysis,name:this.strings.seoAnalysis,manageUrl:this.$aioseo.urls.aio.seoAnalysis},{icon:"svg-location-pin",description:this.strings.manageLocalSeo,name:this.strings.localSeo,manageUrl:this.$aioseo.urls.aio.localSeo},{icon:"svg-share",description:this.strings.manageSocialNetworks,name:this.strings.socialNetworks,manageUrl:this.$aioseo.urls.aio.socialNetworks},{icon:"svg-build",description:this.strings.manageTools,name:this.strings.tools,manageUrl:this.$aioseo.urls.aio.tools},{icon:"svg-sitemaps-pro",description:this.strings.manageSitemap,name:this.strings.sitemap,manageUrl:this.$aioseo.urls.aio.sitemaps}]}}),methods:Object(n["a"])(Object(n["a"])({},Object(c["b"])(["dismissNotifications"])),{},{processDismissAllNotifications:function(){var t=[];this.notifications.forEach((function(s){t.push(s.slug)})),this.dismissNotifications(t)}})},l=d,h=(i("145f"),i("2877")),u=Object(h["a"])(l,e,o,!1,null,null,null);s["default"]=u.exports}}]);