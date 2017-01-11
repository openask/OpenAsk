<?php

return [
    // 主导航栏下面的一排话题链接
    'topic_names' => [
        'javascript', 'php', 'python', 'java', 'mysql', 'ios', 'android', 'node.js',
        'html5', 'linux', 'c++', 'css3', 'git', 'golang', 'ruby', 'vim', 'docker'
    ],
    // 两次评论间隔时间
    'comment_interval' => 15,
    // 是否限制一个问题一个用户只能回答一次
    'only_one_answer_per_user' => 1,
    // @todo 权限列表，暂时记录在此做个记录
    'permissions' => [
        'delete_comment' => '删除评论',
    ],
];
