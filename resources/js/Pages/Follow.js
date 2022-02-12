import React, { useEffect, useState } from 'react'
import Authenticated from '@/Layouts/Authenticated'
import {
  Header,
  Breadcrumbs,
  RefreshAndBack,
  HeaderBreadcrumbs,
  Skeletons,
} from '@/Components'
import { FollowUpTableView } from '@/Components/Follows'

const Follow = (props) => {
  const [isLoadingRefesh, setIsLoadingRefesh] = useState(false)
  const [followData, setFollowData] = useState(null)

  const getFollowUp = () => {
    setIsLoadingRefesh(true)

    setTimeout(() => {
      setIsLoadingRefesh(false)
      setFollowData([])
    }, 3000)
  }

  useEffect(() => {
    getFollowUp()
  }, [])

  return (
    <Authenticated
      auth={props.auth}
      errors={props.errors}
      header={<Breadcrumbs breadcrumbs={props.breadcrumbs} />}
    >
      <Header title={props.title} description={props.description} />
      {/* Navigation ends */}
      {/* Page title starts */}
      <div className="">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="my-6 lg:my-2 container mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between pb-4 border-b border-gray-300">
            <div>
              <HeaderBreadcrumbs dateTimeFromServer={props.on_date} />
            </div>
            <div className="mt-6 lg:mt-0">
              <RefreshAndBack
                isLoadingRefesh={isLoadingRefesh}
                reloadData={getFollowUp}
              />
            </div>
          </div>
          {/* Page title ends */}
          <div className="container mx-auto">
            <div className="w-full rounded">
              {!followData && <Skeletons />}
              {followData && <FollowUpTableView obj={followData} />}
            </div>
          </div>
        </div>
      </div>
    </Authenticated>
  )
}

export default Follow
