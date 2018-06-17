<?php

/**
 * This configuration will be read and overlaid on top of the
 * default configuration. Command line arguments will be applied
 * after this file is read.
 */
return [
 
    // Backwards Compatibility Checking. This is slow
    // and expensive, but you should consider running
    // it before upgrading your version of PHP to a
    // new version that has backward compatibility
    // breaks.
    'backward_compatibility_checks' => true,
 
    // Added in 0.10.0. Set this to false to emit
    // PhanUndeclaredFunction issues for internal functions
    // that Phan has signatures for,
    // but aren't available in the codebase or the
    // internal functions used to run phan
    'ignore_undeclared_functions_with_known_signatures' => false,
 
    // By default, Phan will analyze all node types.
    // If this config is set to false, Phan will do a
    // shallower pass of the AST tree which will save
    // time but may find less issues.
    'should_visit_all_nodes' => true,
 
    // If empty, no filter against issues types will be applied.
    // If this white-list is non-empty, only issues within the list
    // will be emitted by Phan.
    'whitelist_issue_types' => [],
     
    // A list of directories that should be parsed for class and
    // method information. After excluding the directories
    // defined in exclude_analysis_directory_list, the remaining
    // files will be statically analyzed for errors.
    //
    // Thus, both first-party and third-party code being used by
    // your application should be included in this list.
    'directory_list' => [
        'src',
        'tests',
	    'vendor/phpunit/phpunit/src',
    ],
 
    // A directory list that defines files that will be excluded
    // from static analysis, but whose class and method
    // information should be included.
    //
    // Generally, you'll want to include the directories for
    // third-party code (such as "vendor/") in this list.
    //
    // n.b.: If you'd like to parse but not analyze 3rd
    //       party code, directories containing that code
    //       should be added to both the `directory_list`
    //       and `exclude_analysis_directory_list` arrays.
    "exclude_analysis_directory_list" => [
        'vendor/'
    ],
];
