# TuAmica 2019

## Important .env variables to have filled out:

* APP_ENV
* APP_DEBUG
* APP_URL
* MAIL_DRIVER
* MAIL_RECIPIENT
* MAIL_FROM_ADDRESS
* MAIL_FROM_NAME
* MAILGUN_DOMAIN
* MAILGUN_SECRET

## Asset pipeline
* Install prescribed  version of [nodejs](https://nodejs.org) with Node Version Manager
  * Run `nvm install`, then `nvm use`
* Install necessary node modules with [Node Package Manager](https://www.npmjs.com/)
  * Run `npm install`
* Update the `~/project.config.json` to reflect project directory structure (more below)
  * __WARNING__ the `.gitignore` is set to ignore `./ui/dist`; if your installation isn't in the root directory (`./`) of your project, __or__ you're using custom directories, you'll need to update the `.gitignore` to reflect that. Otherwise, Git will track your output and you'll get an __unrelenting barrage of conflicts__
* Start building front-end files with WebPack watch &mdash; `npm run develop` (more below)

### project.config.json
The `project.config.json` defines the location of all the files/directories referenced in `gulpfile.js` and in `webpack.config.js`.

| Property  | Description   |
| --- | --- |
| `theme` | `Object`: Collects details relating to the project's __Theme__ location (if there is one) |
| `source` | `Object`: Collects details relating to the project's __Source__ directories/files |
| `asset` | `Object`: Collects details relating to the project's __Asset__ (compiled/output) directories/files |
| `*.path` | `String`: path to the root directory (e.g. `foo/bar/`, `./`) |
| `*.pattern` | `String`: [glob matching pattern](https://stackoverflow.com/a/26506124/5796134) |
| ~`*.output`~ | ~`String`: desired filename for resulting output (e.g. `compiled-styles.css`)~ |
| `source.scripts.build` | `Object`: Collects details about the project's __Build__ process directories/files |
| `source.scripts.build.entry` | `String`: The file that acts as an entry point for [WebPack's Single Entry Point](https://webpack.js.org/concepts/entry-points/#single-entry-shorthand-syntax) |

### __NEW!__ Build Process
Building JS and compiling SASS are now handled with WebPack; which we're using [NPM scripts](https://docs.npmjs.com/misc/scripts) to run. There are two default NPM scripts for building the project, `develop` and `build`.

| Script | Description |
| --- | --- |
| `npm run develop` | Starts WebPack with some development-specific parameters, including setting a watcher on the SCSS and JS files in the project (as configured in the `project.config.json`). You might consider gicing this process its own terminal, 'cause it ain't going to surrender the command line until you __Ctrl+C__. |
| `npm run build` | Starts WebPack with some production-specific parameters (suppress warnings, optimize output, et cetera). No watcher. This command is suited for one-off builds &mdash; especially for automated deployments. |
